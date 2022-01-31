<?php

namespace App\Security;

use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAuthenticationException;
use Symfony\Component\Security\Http\Authenticator\AbstractAuthenticator;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Passport;
use Symfony\Component\Security\Http\Authenticator\Passport\SelfValidatingPassport;

class DiscordAuthenticator extends AbstractAuthenticator
{
    private $userRepository;
    private $apiURLBase = 'https://discordapp.com/api/users/@me';

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function supports(Request $request): ?bool
    {
        return $request->headers->has('X-AUTH-TOKEN');
    }

    public function authenticate(Request $request): Passport
    {
      $apiToken = $request->headers->get('X-AUTH-TOKEN');
      if (null === $apiToken) {
          throw new CustomUserMessageAuthenticationException('No API token provided');
      }

      $user = $this->apiRequest($this->apiURLBase, $apiToken);

      if (isset($user->message) && preg_match('/401/', $user->message)) {
          throw new CustomUserMessageAuthenticationException($user->message);
      }

      return new SelfValidatingPassport(
        new UserBadge($user->email, function ($userIdentifier) {
            return $this->userRepository->findOneBy(['email' => $userIdentifier]);
        }));
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): ?Response
    {
        return null;
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception): ?Response
    {
        $data = [
            'message' => strtr($exception->getMessageKey(), $exception->getMessageData())
        ];

        return new JsonResponse($data, Response::HTTP_UNAUTHORIZED);
    }

    private function apiRequest(string $url, string $token, mixed $post=FALSE, $headers=array()) {
      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    
      $response = curl_exec($ch);
    
    
      if($post) {
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
      }
    
      $headers[] = 'Accept: application/json';
    
      if($token) {
        $headers[] = 'authorization: ' . $token;
      }
    
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    
      $response = curl_exec($ch);
      return json_decode($response);
    }
}
