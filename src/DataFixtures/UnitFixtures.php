<?php

namespace App\DataFixtures;

use App\Entity\Era;
use App\Entity\TypeUnit;
use App\Entity\Unit;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class UnitFixtures extends Fixture implements DependentFixtureInterface, FixtureGroupInterface
{
    public function load(ObjectManager $manager): void
    {
        $units = [
            [
                "name" => "Martellatori",
                "influence" => 30,
                "type" => "fantassins",
                "pict" => "martella.png",
                "rarity" => "sombre"
            ],
            [
                "name" => "Piquiers de milice",
                "influence" => 110,
                "type" => "fantassins",
                "pict" => "pk_mil_pre.png",
                "rarity" => "chevalerie"
            ],
            [
                "name" => "Hallebardiers",
                "influence" => 175,
                "type" => "fantassins",
                "pict" => "halb_pre.png",
                "rarity" => "argos"
            ],
            [
                "name" => "Piquiers du Dragon noir",
                "influence" => 120,
                "type" => "fantassins",
                "pict" => "bla_drag_pike.png",
                "rarity" => "argos"
            ],
            [
                "name" => "Piquiers préfectoraux",
                "influence" => 185,
                "type" => "fantassins",
                "pict" => "pref_pike_pre.png",
                "rarity" => "argos"
            ],
            [
                "name" => "Gardes préfectoraux",
                "influence" => 180,
                "type" => "fantassins",
                "pict" => "pref_guar_pre.png",
                "rarity" => "argos"
            ],
            [
                "name" => "Lanciers du Dragon noir",
                "influence" => 110,
                "type" => "fantassins",
                "pict" => "bla_drag_spear.png",
                "rarity" => "argos"
            ],
            [
                "name" => "Lanciers tête-de-fer",
                "influence" => 175,
                "type" => "fantassins",
                "pict" => "iro_spear_pre.png",
                "rarity" => "argos"
            ],
            [
                "name" => "Javeliniers du Dragon noir",
                "influence" => 115,
                "type" => "tireurs",
                "pict" => "bla_drag_jav.png",
                "rarity" => "argos"
            ],
            [
                "name" => "Pyro-archers",
                "influence" => 180,
                "type" => "tireurs",
                "pict" => "ind_arc_pre.png",
                "rarity" => "argos"
            ],
            [
                "name" => "Arbalétriers d'avant-garde",
                "influence" => 180,
                "type" => "tireurs",
                "pict" => "dem_arb_pre.png",
                "rarity" => "argos"
            ],
            [
                "name" => "Archers d'avant-garde",
                "influence" => 160,
                "type" => "tireurs",
                "pict" => "van_arc_pre.png",
                "rarity" => "argos"
            ],
            [
                "name" => "Archers préfectoraux",
                "influence" => 185,
                "type" => "tireurs",
                "pict" => "pref_arc_pre.png",
                "rarity" => "argos"
            ],
            [
                "name" => "Arquebusiers de domaine",
                "influence" => 200,
                "type" => "tireurs",
                "pict" => "dem_arqu_pre.png",
                "rarity" => "argos"
            ],
            [
                "name" => "Ecuyers",
                "influence" => 170,
                "type" => "fantassins",
                "pict" => "squires_pre.png",
                "rarity" => "argos"
            ],
            [
                "name" => "Archers vipères",
                "influence" => 165,
                "type" => "tireurs",
                "pict" => "ratt_vip_pre.png",
                "rarity" => "argos"
            ],
            [
                "name" => "Maîtres de la chu ko nu",
                "influence" => 180,
                "type" => "tireurs",
                "pict" => "ratt_mar_pre.png",
                "rarity" => "argos"
            ],
            [
                "name" => "Prévôts hallebardiers",
                "influence" => 230,
                "type" => "fantassins",
                "pict" => "halb_serg_pre.png",
                "rarity" => "héroïque"
            ],
            [
                "name" => "Piquiers impériaux",
                "influence" => 240,
                "type" => "fantassins",
                "pict" => "imp_pk_pre.png",
                "rarity" => "héroïque"
            ],
            [
                "name" => "Gardes du palais",
                "influence" => 235,
                "type" => "fantassins",
                "pict" => "pala_guar_pre.png",
                "rarity" => "héroïque"
            ],
            [
                "name" => "Lanciers impériaux",
                "influence" => 245,
                "type" => "fantassins",
                "pict" => "imp_spea_guar_pre.png",
                "rarity" => "héroïque"
            ],
            [
                "name" => "Prévôts javeliniers",
                "influence" => 230,
                "type" => "tireurs",
                "pict" => "jav_serg_pre.png",
                "rarity" => "héroïque"
            ],
            [
                "name" => "Javeliniers impériaux",
                "influence" => 240,
                "type" => "tireurs",
                "pict" => "imp_jav_pre.png",
                "rarity" => "héroïque"
            ],
            [
                "name" => "Archers gallos",
                "influence" => 245,
                "type" => "tireurs",
                "pict" => "vas_long_pre.png",
                "rarity" => "héroïque"
            ],
            [
                "name" => "Archers impériaux",
                "influence" => 255,
                "type" => "tireurs",
                "pict" => "imp_arc_pre.png",
                "rarity" => "héroïque"
            ],
            [
                "name" => "Arquebusiers du Kriegsrat",
                "influence" => 255,
                "type" => "tireurs",
                "pict" => "krieg_fus_post.png",
                "rarity" => "héroïque"
            ],
            [
                "name" => "Arquebusiers impériaux",
                "influence" => 255,
                "type" => "tireurs",
                "pict" => "imp_arq_pre.png",
                "rarity" => "héroïque"
            ],
            [
                "name" => "Yeomen",
                "influence" => 240,
                "type" => "cavaliers",
                "pict" => "yeom_pre.png",
                "rarity" => "héroïque"
            ],
            [
                "name" => "Cavaliers lourds préfectoraux",
                "influence" => 240,
                "type" => "cavaliers",
                "pict" => "pre_hea_cav_pre.png",
                "rarity" => "héroïque"
            ],
            [
                "name" => "Lanciers avec esponton",
                "influence" => 240,
                "type" => "cavaliers",
                "pict" => "dag_axe_lan_pre.png",
                "rarity" => "héroïque"
            ],
            [
                "name" => "Prévôts lanciers",
                "influence" => 250,
                "type" => "fantassins",
                "pict" => "spe_sarg_pre.png",
                "rarity" => "héroïque"
            ],
            [
                "name" => "Hommes d'armes",
                "influence" => 240,
                "type" => "fantassins",
                "pict" => "men_at_arms_pre.png",
                "rarity" => "héroïque"
            ],
            [
                "name" => "Fauchefers",
                "influence" => 315,
                "type" => "fantassins",
                "pict" => "ir_rea_pre.png",
                "rarity" => "aurum"
            ],
            [
                "name" => "Arbalétriers pavoiseurs",
                "influence" => 325,
                "type" => "tireurs",
                "pict" => "pavi_cros.png",
                "rarity" => "aurum"
            ],
            [
                "name" => "Arquebusiers tercios",
                "influence" => 310,
                "type" => "tireurs",
                "pict" => "tercio.png",
                "rarity" => "aurum"
            ],
            [
                "name" => "Cataphractaires lanciers",
                "influence" => 310,
                "type" => "cavaliers",
                "pict" => "cata_lan_pre.png",
                "rarity" => "aurum"
            ],
            [
                "name" => "Hussards ailés",
                "influence" => 315,
                "type" => "cavaliers",
                "pict" => "win_hus_pre.png",
                "rarity" => "aurum"
            ],
            [
                "name" => "Pyro-lanciers",
                "influence" => 305,
                "type" => "cavaliers",
                "pict" => "fire_lan_pre.png",
                "rarity" => "aurum"
            ],
            [
                "name" => "Templiers",
                "influence" => 305,
                "type" => "cavaliers",
                "pict" => "mona_kni.png",
                "rarity" => "aurum"
            ],
            [
                "name" => "Maîtres de la chu ko nu montés",
                "influence" => 305,
                "type" => "cavaliers",
                "pict" => "ratt_ran_pre.png",
                "rarity" => "aurum"
            ],
            [
                "name" => "Archers de Namkhan",
                "influence" => 180,
                "type" => "tireurs",
                "pict" => "nam_arch.png",
                "rarity" => "argos"
            ],
            [
                "name" => "Pionniers de Selem",
                "influence" => 170,
                "type" => "cavaliers",
                "pict" => "selem_cav.png",
                "rarity" => "argos"
            ],
            [
                "name" => "Khorchins",
                "influence" => 170,
                "type" => "cavaliers",
                "pict" => "khorchins.png",
                "rarity" => "argos"
            ],
            [
                "name" => "Tseregs",
                "influence" => 240,
                "type" => "fantassins",
                "pict" => "tseregs.png",
                "rarity" => "héroïque"
            ],
            [
                "name" => "Cavaliers kevthuuls",
                "influence" => 245,
                "type" => "cavaliers",
                "pict" => "khev_cav.png",
                "rarity" => "héroïque"
            ],
            [
                "name" => "Gardes kheshigs",
                "influence" => 310,
                "type" => "cavaliers",
                "pict" => "kheshigs.png",
                "rarity" => "aurum"
            ],
            [
                "name" => "Condottières",
                "influence" => 170,
                "type" => "fantassins",
                "pict" => "condo_gua.png",
                "rarity" => "argos"
            ],
            [
                "name" => "Piquiers de Fortebraccio",
                "influence" => 235,
                "type" => "fantassins",
                "pict" => "forte_pike.png",
                "rarity" => "héroïque"
            ],
            [
                "name" => "Falconetti",
                "influence" => 330,
                "type" => "fantassins",
                "pict" => "falco_gun.png",
                "rarity" => "aurum"
            ],
            [
                "name" => "Janissaires",
                "influence" => 190,
                "type" => "tireurs",
                "pict" => "janissary_main.png",
                "rarity" => "argos"
            ],
            [
                "name" => "Azaps",
                "influence" => 240,
                "type" => "fantassins",
                "pict" => "azap_main.png",
                "rarity" => "héroïque"
            ],
            [
                "name" => "Silahdars",
                "influence" => 320,
                "type" => "fantassins",
                "pict" => "sihl_main.png",
                "rarity" => "aurum"
            ],
            [
                "name" => "Cyphaux",
                "influence" => 245,
                "type" => "cavaliers",
                "pict" => "sipahi_main.png",
                "rarity" => "héroïque"
            ],
            [
                "name" => "Milice zykalienne",
                "influence" => 175,
                "type" => "tireurs",
                "pict" => "barc-wild-cover.png",
                "rarity" => "argos"
            ],
            [
                "name" => "Fidèles symmachéens",
                "influence" => 260,
                "type" => "fantassins",
                "pict" => "symm_stal_cover.png",
                "rarity" => "héroïque"
            ],
            [
                "name" => "Paladins symmachéens",
                "influence" => 255,
                "type" => "fantassins",
                "pict" => "symm_pal_cover.png",
                "rarity" => "héroïque"
            ],
            [
                "name" => "Siphonaros",
                "influence" => 330,
                "type" => "tireurs",
                "pict" => "barc-narf-gua-cover.png",
                "rarity" => "aurum"
            ],
            [
                "name" => "Fils de Fenrir",
                "influence" => 180,
                "type" => "fantassins",
                "pict" => "sons_of_fenrir_main.png",
                "rarity" => "argos"
            ],
            [
                "name" => "Berserkers",
                "influence" => 245,
                "type" => "fantassins",
                "pict" => "berserker_main.png",
                "rarity" => "héroïque"
            ],
            [
                "name" => "Skjaldmös",
                "influence" => 310,
                "type" => "fantassins",
                "pict" => "shieldmaidens_main.png",
                "rarity" => "aurum"
            ],
            [
                "name" => "Moines guerriers",
                "influence" => 190,
                "type" => "fantassins",
                "pict" => "cudgel_monks_main.png",
                "rarity" => "argos"
            ],
            [
                "name" => "Vigiles grisonnants",
                "influence" => 240,
                "type" => "fantassins",
                "pict" => "greyhair_garrison_main.png",
                "rarity" => "héroïque"
            ],
            [
                "name" => "Gardes au modao",
                "influence" => 315,
                "type" => "fantassins",
                "pict" => "modao_battalion_main.png",
                "rarity" => "aurum"
            ],
            [
                "name" => "Lansquenets",
                "influence" => 175,
                "type" => "fantassins",
                "pict" => "landsknechts_cover.png",
                "rarity" => "argos"
            ],
            [
                "name" => "Eclaireurs de Liao",
                "influence" => 315,
                "type" => "cavaliers",
                "pict" => "liaos_rangers_cover.png",
                "rarity" => "aurum"
            ],
            [
                "name" => "Lanciers ribauds",
                "influence" => 240,
                "type" => "cavaliers",
                "pict" => "armiger_lancers_cover.png",
                "rarity" => "héroïque"
            ],
            [
                "name" => "Maraudeurs",
                "influence" => 180,
                "type" => "cavaliers",
                "pict" => "outriders_main.png",
                "rarity" => "argos"
            ],
            [
                "name" => "Lanceurs de haches",
                "influence" => 240,
                "type" => "fantassins",
                "pict" => "axe_raiders_main.png",
                "rarity" => "héroïque"
            ],
            [
                "name" => "Grenadiers de Shenji",
                "influence" => 315,
                "type" => "tireurs",
                "pict" => "shenji_grenadiers_main.png",
                "rarity" => "aurum"
            ],
            [
                "name" => "Cornemuseurs",
                "influence" => 120,
                "type" => "fantassins",
                "pict" => "bagpipers_main.png",
                "rarity" => "argos"
            ],
            [
                "name" => "Claymores",
                "influence" => 235,
                "type" => "fantassins",
                "pict" => "claymores_main.png",
                "rarity" => "héroïque"
            ],
            [
                "name" => "Veneurs",
                "influence" => 310,
                "type" => "fantassins",
                "pict" => "houndsmen_main.png",
                "rarity" => "aurum"
            ]
        ];

        foreach ($units as $u) {
            $unit = new Unit();
            $type = $manager->getRepository(TypeUnit::class)->findOneBy([
                'name' => $u['type']
            ]);
            $era = $manager->getRepository(Era::class)->findOneBy([
                'name' => $u['rarity']
            ]);
            
            $unit->setName($u['name'])
                ->setInfluence($u['influence'])
                ->setEra($era)
                ->setTypeUnit($type)
                ->setPict($u['pict'])
            ;
            $manager->persist($unit);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            TypeUnitFixtures::class,
            EraFixtures::class
        ];
    }
    
    public static function getGroups(): array
    {
        return ['admin', 'dev'];
    }
}
