<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BlogPost>
 */
class BlogPostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $body_data = [
            '
            <h1>Heading 1</h1>
            <h2>Heading 2</h2>
            <h3>Heading 3</h3>
            <h4>Heading 4</h4>
            <h5>Heading 5</h5>
            <h6>Heading 6</h6>
            <p>
                Kane alfred alcor ali lucius doom. Dent charlatan faith superman batmobile ghul society zucco owl calendar penguin. Owl creeper huntress shade chill face. Damian killer metallo martha prey todd collector lynx huntress outsider spoiler chase. Raatko batman arkham jason grey knight oracle outsider. Green tally maxie abbott deathstroke ventriloquist gordon atomic batmobile, smoke cypher ragdoll? Firefly bruce oracle pit prey elongated calendar batcave lantern temblor. Ragman nyssa jim fox croc? Superman carmine moth killer carmine harvey anarky batarang pennyworth. Toymaker edward a ra cypher scorn justice spectre raatko atom calendar face. Elongated barrow blake todd clench society jason. Fairchild charlatan temblor lynx prey! Chill oracle bat manor chill clench thomas shade? Swamp diamond joker.
                </p>
                <p>
                Abbott spoiler canary, diamond wing azrael rupert scarecrow fright. Gargoyle maxie creeper knight. Sinestro arkham nyssa bruce joe two shiva shrike arkham league chimera elongated. Luthor fright batarang lazarus wing elongated! Harley chase huntress damian harlequin bennett batcave freeze. Todd oracle barrow kobra killer cobblepot shade league anarky? Kane charlatan justice owl fright maroni oswald atom of grundy justice grundy checkmate. Blink harley sinestro fox penguin. Deadshot aiko beetle metallo amanda anarky oracle oswald. Spoiler snake czonk fox of lynx. Crane solomon wing ra wayne montoya fox blake kyle. Maxie young pennyworth joker fox. Bullock amanda raatko of croc. Pit lantern katana kobra rupert league bennett fright ragman. League maxie freeze green doom poison creeper shade gearhead batmobile zeus. Solomon firefly mad.
                </p>
                <p>
                Bartok zeus amanda outsider. Batarang spoiler croc aiko czonk hatter blink deathstroke harley superman thomas. Abdullah ventriloquist wayne; temblor justice fright lynx. Strange poison ragdoll metallo joe cluemaster bullock shiva mask atkins clayface cobblepot harlequin. Hatter harlequin scarecrow face wayne canary toymaker spoiler batarang batmobile swamp solomon grey. Abdullah supergirl?
                </p>
                <p>
                Young kane pennyworth ali spoiler bat, calendar croc. Grey zeus smoke cobblepot falcone tumbler shrike. Beetle, elongated vale nocturna chill azrael night croc canary moth. Quinn ragman basil martha collector! Beetle, cypher spectre beetle lantern sinestro. Fairchild katana atom justice mugsy edward penguin, edward smoke pit knight faith. Swamp ragman shrike night fox rupert batman elongated ventriloquist? Alfred gotham lynx scarecrow ragdoll zucco atkins.
                </p>
                <p>
                Ali manor tumbler grayson young lynx boomerang hood tally nocturna hangman toymaker. Fright abbott, shiva scorn chase joe owl hatter. Katana dick jason supergirl sinestro blue faith, metallo hangman hatter calendar harlequin. Faith gordon copperhead birds. Lucius cluemaster czonk atomic maxie master mister. Katana nocturna charlatan blake blink rupert anarky young shade oracle. Copperhead grey arkham shadow black hangman azrael cypher. Hammer thomas young checkmate firefly face hatter huntress batman zatanna harley chimera clock. Freeze hammer shade grey shrike abattoir snake aiko nyssa. Croc, kane america gordon joker tumbler bartok martha harley maroni zeus! Ragman penguin prey elongated clench alcor hugo. Wing helena knight scorn. Fright ra rose chill rumor. Luthor young mask bat, batman bane pennyworth. Lazarus thomas; shrike thomas blink. League!
            </p>',
            '
                        <h1>Heading 1</h1>
            <h2>Heading 2</h2>
            <h3>Heading 3</h3>
            <h4>Heading 4</h4>
            <h5>Heading 5</h5>
            <h6>Heading 6</h6>
            <p>
                Angel silvermane magneto, ricochet lilandra titania invaders janefoster. Nighthawk bucky, satana moleculeman scarletspider dust. Rand spectrum skaar morbius hydra snowbird gorillaman deathlok. Arcade natasha riptide spider-woman greengoblin prism pryde harrier stature titania johnnyblaze constrictor. Bucky elektra amora ilyana janefoster vulture yellowjacket crossbones omega proudstar zola piledriver caretaker. Tombstone blink dazzler constrictor quentinquire? Morlun galactus doop ghostrider ironpatriot hobgoblin sage howard kang maverick. Armadillo shield medusa skreet kaine crystal groot warpath callisto hammer. Nefaria jocasta rogue surge annihilus redhulk betaray ricochet? Crystal bluemarvel nickfury nova quasar mrfantastic centurions northstar! Arachne surge bob kraven emmafrost caliban braddock? Sabretooth faustus giantman zodiak. Eternals piledriver lukecage wong bullseye felicia countess cerebro mockingbird ironman. Warmachine marrow agentx eternals moonstar mephisto marrow wonderman. Nuke crossbones ronan defenders skrulls pandemic gladiator. Caretaker yellowjacket firebrand.
                </p>
                <p>
                Gamora braddock constrictor stick chamber, madrox maximus? Kingpin brood professorx archangel x-statix archangel arnim yellowjacket contessa invaders elektra madrox. Lockheed purpleman pandemic crystal ezekiel dagger. Rockslide warpath octopus morph mistyknight reaper kree. Sunspot ff harrier hulkling wildchild mrhyde wasp purpleman. Crusher falcon, wilsonfisk ronan odin foggy dust mayparker. Havok reaper warbird rocketraccoon moondragon wasp exiles? Jubilee changeling abomb redwing masque, celestials tonystark avengers caretaker beyonder atlas uatu. Star-lord hankpym star-lord madripoor changeling captainamerica moltenman beast crossbones. Tinkerer daken bullseye scarletspider vulcan pyro unionjack daredevil bullseye jigsaw. Doop rasputin logan runaways bushwacker asgardian ironpatriot jackpot. Morbius mrfantastic menace janefoster wonderman gargoyle lockjaw whitetiger caretaker. Boomerang thor contessa gambit xavier x-force medusa warbound arcade? Agentx blackheart cuckoos cardiac.
                </p>
                <p>
                Ink suestorm x-men enchantress sentry, lightspeed danvers forge praxagora hyperion patch. Spider-man miek x-statix cyclops. Namora ares vanisher whitetiger vulcan mentallo. Loki banner shiva hellcat. Phyla-vell whitetiger quasar, satana thing blackbolt scorpion barnes thunderbolts. Spider-woman, uatu titania rhino drax korg namor lilith ego. Mentor boomerang whitetiger callisto thing cyclops hulk betaray jackpot destiny. Sage falcon loki, corsair sandman chimera ricochet. Betaray enchantress stick valkyrie nefaria moleculeman! Crusher araña, warpath mordo hobgoblin moonstar wilsonfisk domino lifeguard paladin genis-vell. Msmarvel osborn felicia redwing hobgoblin nightmare wonderman.
                </p>
                <p>
                Amora tusk cannonball skaar shiva ricochet. Hammerhead crystal johnnystorm sentinels riptide bullseye daken hammerhead mauler. Hulk blackpanther strange earthquake sabretooth caretaker romulus yellowjacket nomad wildchild earthquake. Scourge mongoose daredevil dust gladiator jameson prism x-force. Bucky dagger zodiak morlocks deathlok blackwidow thunderbolts boomboom mactaggert. Azazel mactaggert nomad crusher unus satana deathbird spectrum spider-ham professorx blastaar strange. Jameson sentry patriot korvac exodus ghostrider blackheart hepzibah lukecage scourge. Eternals domino armadillo mauler lightspeed lukecage. Octopus mayparker romanoff whirlwind shocker bloodstone. Sasquatch bug benreilly morbius doop. Drax dust punisher carnage wilsonfisk foggy dugan archangel.
                </p>
                <p>
                Zemo vulture satana carnage moltenman magus. Riptide norrinradd firebrand quentinquire northstar gladiator taskmaster kaine feral? Kingpin dagger mistyknight silversurfer. Gladiator contessa, cerebro humantorch arachne. Eternals grandmaster, sage sunspot titania satana aim. Banner taskmaster jocasta parker urich? Corsair korg hankpym morlocks annihilus countess hepzibah. Madrox doop manthing barton komodo ilyana loki sage spyke? Unus, captainbritain tinkerer celestials. Sabretooth jameson bushwacker blink spot mauler beyonder vanisher maverick. Wasp x-51 powerman excalibur jimmywoo hawkeye blob strange blackknight emmafrost. Blade dugan cable ironman. Hellion kitty braddock scarletwitch morph. Countess cyber msmarvel spyke lockheed cyclops morlun hellcat. Kitty screwball riptide blackcat spider-man northstar harrier bob. Tarantula ff faustus darkhawk toxin lightspeed moleculeman wiccan annihilus lockjaw! Wolfsbane chamber colossus.
                </p>
                <p>
                Drax chameleon felicia groot titania elektra magus countess deathlok. Greengoblin tombstone arnim cypher falcon maelstrom ricochet moonstone aurora. Destiny eternals phalanx nefaria. Galactus kitty vanisher pepperpotts patriot phyla-vell zemo, kree hulkling typhoidmary osborn. Hulkling prodigy nickfury tigra. Tarantula pyro thor mojo she-hulk rand abomination karma rasputin wraith. Abomb apocalypse powerman; ironman brood arcade ronan captainamerica cyber phalanx johnnyblaze valkyrie. Earthquake beyonder gwen quasar sugarman celestials mystique arachne hobgoblin reaper. Sandman steverogers cable patriot hammer nickfury shaman avengers humantorch. Speedball pryde spot avengers osborn. Amora psylocke, dust gorillaman wildchild hellcat. Wildchild arcana apocalypse romulus korg tinkerer wonderman madripoor namor! Romanoff cyclops sunfire deathlok contessa bluemarvel pepperpotts ironfist captainbritain unus moonknight giantman. Lilith.
                </p>
                <p>
                Ink echo korg emmafrost silversurfer countess havok penance sprite cypher arnim nightcrawler mistyknight. Shield menace ink moltenman bug giantman kingcobra prism vanisher. Redhulk sabretooth vanisher spider-man destiny mauler. Whitetiger, deathstrike ultron vision wildchild whiplash snowbird corsair quasimodo punisher conners piledriver jessicadrew. Kingcobra, spider-ham nova gambit rand. Illuminati strange moonstone enchantress deathlok bloodstone fantomex jarvis x-men cardiac pepperpotts macgargan. Sugarman punisher titania araña bullseye psylocke genis-vell groot. Macgargan jackpot rhodes snowbird bug invaders toro domino. Firestar gladiator scourge humantorch romanoff prism mojo morlun jameson gwen namor star-lord. Pandemic proudstar conners manwolf bushwacker foggy gambit blob spider-woman sunfire octopus, zola stature. Chamber piledriver deathbird spectrum. Morlun boomboom boomboom deathstrike? Silversurfer mrhyde faustus paladin firebrand jameson. Ricochet maverick avengers!
                </p>
                <p>
                Moleman jameson madripoor avengers rhodes, gamora smasher suestorm colossus rasputin. Runaways captainmarvel maverick hercules jessicajones nightmare cardiac spider-girl moleculeman arcade. Phyla-vell maelstrom dynamo namora cannonball patch empath uatu vision mauler! Hyperion cuckoos spectrum blob lifeguard nova magus strange. Araña northstar johnnyblaze lightspeed cyclops hulk wonderman. Gorgon shield flatman caretaker. Greengoblin eternals thing jameson lilith steverogers karnak cypher calypso sunfire thor wildchild. Deathbird howlett beast pride.
                </p>
                <p>
                Daredevil cardiac asgardian, octopus unus strange. Nomad ghostrider tigra spider-man cypher. Piledriver felicia jubilee ezekiel wasp reaper blackheart whirlwind thanos. Cyclops corsair shield ff danvers? Scrambler, tonystark nova marrow firebird jackal nova. Wong bushwacker lukecage thing pryde snowbird maestro komodo. Zemo, benreilly urich grimreaper. Phalanx prodigy, jackpot spyke maestro? Skrulls x-51 bullseye ironfist powerman stick. Stature drax diablo felicia sif corsair paladin cyber. Tigra faustus maximus blackknight spider-woman chameleon bishop betaray! Fantomex mystique illuminati phyla-vell changeling purpleman hammer silversurfer cerebro bob modok falcon annihilus.
                </p>
                <p>
                Blade lionheart lightspeed moondragon foggy ghostrider magneto kingcobra mayparker celestials moonknight? Runaways, pandemic diablo jigsaw blackcat jimmywoo purpleman gamora inhumans crusher octopus cannonball. Polaris penance araña hellcat. Moleculeman excalibur sauron jigsaw norrinradd. Kingpin avalanche hankpym banner stryker stature blink klaw barnes doom excalibur msmarvel ares! Whitetiger fisk quasar unus squirrel-girl moonstar redhulk spot caretaker patriot husk. Sasquatch quasimodo maverick patch sprite zemo wasp cypher pixie. Janefoster elixir steverogers, kronos whiplash grimreaper cyclops. Gargoyle runaways; empath magus hawkeye moonknight captainamerica miracleman gwen asgardian sif. Urich moondragon humantorch johnnyblaze nuke modok. Rocketraccoon gargoyle captainbritain husk magneto shiva. Valkyrie ilyana mauler hobgoblin modok. Patriot toxin.
                </p>',
                '
                            <h1>Heading 1</h1>
            <h2>Heading 2</h2>
            <h3>Heading 3</h3>
            <h4>Heading 4</h4>
            <h5>Heading 5</h5>
            <h6>Heading 6</h6>
                <p>
                    Posuere enim litora varius natoque ac primis donec at praesent imperdiet. Sed quam elementum accumsan maecenas proin posuere cum nisi etiam cursus montes placerat. Nec phasellus volutpat elit, viverra rhoncus vestibulum ante dui ullamcorper diam eleifend. Sociosqu turpis ad quis semper luctus praesent. At semper dictum odio hendrerit primis placerat parturient. Ridiculus cursus cras condimentum blandit curabitur, dictumst mollis quisque. Posuere suspendisse adipiscing pellentesque mauris. Nisl?
                    </p>
                    <p>
                    Montes odio senectus mollis consectetur. Class massa quis elit vivamus hendrerit potenti tempor at at. Sodales mollis semper massa! Pulvinar; praesent vulputate commodo auctor vestibulum scelerisque aenean arcu. Ut consectetur aptent egestas hac tempus orci mauris blandit taciti! Praesent feugiat semper taciti aliquam lacus metus aliquam hendrerit quis! Lacus taciti placerat quisque.
                    </p>
                    <p>
                    Vehicula proin sit velit! Taciti lacus gravida porttitor a? Mus adipiscing natoque eu potenti viverra purus platea tincidunt hac. Ultrices maecenas cras facilisi sapien? Habitant massa lectus imperdiet proin sodales? Magna aenean est mattis luctus vitae fames neque sociosqu scelerisque. Egestas nam vitae metus ad, eget sit dis aptent parturient. Faucibus cursus habitant dictumst non dictum odio. Suspendisse ipsum suscipit varius eget per. Aenean risus posuere sollicitudin libero potenti nisi eleifend ligula auctor litora accumsan. Duis a cum facilisis varius vehicula maecenas ut leo sodales. Euismod vivamus, donec aliquam. Magnis torquent praesent cum sapien dapibus gravida potenti. Facilisis volutpat ad nam nisi. Lectus mattis vestibulum interdum tristique habitasse fusce suspendisse nisl! Condimentum curabitur posuere semper elit. Mauris curabitur lorem imperdiet pulvinar montes. Augue egestas quis, vestibulum ullamcorper eu euismod torquent orci erat. Odio aptent dictumst amet nullam magna condimentum iaculis curabitur ultrices mus. In sollicitudin class senectus taciti feugiat netus dictumst consectetur? Morbi nascetur platea, nec dui dapibus aenean leo. Aliquet vestibulum sed mauris viverra aptent cras. Inceptos turpis mattis vulputate.
                    </p>
                    <p>
                    Curabitur facilisi justo laoreet vitae elementum adipiscing himenaeos vestibulum in. Iaculis amet tincidunt sed mi! Id augue sociosqu mi suspendisse! Primis ante habitasse hac non non? Sem mollis consectetur consequat tortor phasellus odio dictumst mus dis torquent hac mollis. Amet natoque parturient viverra velit ornare nunc risus amet dolor libero montes. Rhoncus porta libero semper interdum at bibendum nulla senectus urna maecenas taciti. Viverra proin; adipiscing nostra volutpat himenaeos fusce! Aptent egestas praesent at rutrum metus aliquam urna vivamus. Nostra in posuere blandit id at, felis tempus dictum ipsum litora sollicitudin. Vulputate turpis posuere tortor vel. Suscipit lectus montes ut montes fusce sagittis vel sit. Eget curabitur eleifend magna consectetur sociosqu dictumst facilisi? Fermentum libero cum tristique. Litora neque vulputate senectus enim aliquam fusce netus lectus volutpat leo non iaculis. Erat proin tincidunt imperdiet metus viverra. Nisl curae; proin sed pretium nunc aliquam varius scelerisque nulla diam congue. Adipiscing inceptos lobortis integer. Odio dapibus montes molestie montes. Ridiculus ut natoque urna purus porta nunc metus erat! Ullamcorper euismod rhoncus curabitur. Semper dignissim tristique condimentum bibendum molestie lectus morbi dictum. Feugiat sed risus, morbi integer potenti class praesent mattis per? Pretium magnis fusce cum est, duis consectetur libero sociis.
                    </p>
                    <p>
                    Mus donec posuere sollicitudin facilisis nunc potenti blandit rhoncus diam vel dui curabitur. Molestie dui etiam leo viverra elit nunc. Parturient himenaeos nunc auctor phasellus vulputate. Nec tincidunt diam feugiat, magnis auctor felis lorem pharetra. Duis donec cursus nulla. Sit elementum cum interdum non nisi. Vestibulum porta suspendisse laoreet habitasse tortor cubilia sociosqu mattis metus orci consectetur. Vulputate magna quis dictumst curae; pulvinar senectus cubilia. Donec aenean purus consectetur aliquet netus nostra taciti enim eu tortor nisi. Dignissim commodo est ullamcorper ligula praesent venenatis suscipit. Justo eros pellentesque et tellus in quam id id dictum. Nisl elementum facilisi et. Lacinia, aenean facilisi facilisis mollis. Faucibus nec litora curabitur condimentum. Scelerisque sed penatibus sollicitudin porta dictumst et blandit ligula. Metus ipsum aliquam et pretium sociis rhoncus justo. Magna ultrices nulla diam maecenas nullam. Orci orci turpis tempor tempor. Malesuada vitae arcu aenean dapibus congue class, sociosqu fermentum.
                    </p>
                    <p>
                    Potenti ac nullam diam est enim euismod est? Semper enim consectetur morbi. Viverra hac libero lobortis fusce fermentum libero convallis per mauris. Nascetur cum nascetur curabitur dolor elementum? Fames feugiat inceptos nisl ultricies elit euismod velit mattis. Facilisis placerat aliquam euismod cum dictumst conubia fringilla sociosqu donec ipsum. Dictumst phasellus malesuada varius proin elit. Consectetur himenaeos amet commodo euismod nec fames. Eros varius porta consequat.
                    </p>
                    <p>
                    Odio nisl eget nascetur vel rutrum praesent class varius lobortis hac dignissim. Non inceptos magnis laoreet ornare! Lorem primis arcu vivamus justo vehicula ligula habitant et libero enim himenaeos aenean. Vel nisl convallis eleifend viverra? Nec bibendum sodales et maecenas duis semper rutrum gravida sodales aliquam blandit sit. Sapien eleifend pharetra ridiculus consectetur ullamcorper quam. Tellus consequat potenti interdum lorem venenatis suspendisse vestibulum phasellus erat. Litora dignissim habitant adipiscing tortor! Aliquam netus porta magnis leo euismod natoque commodo nec ultrices scelerisque montes. Eros eu sem nisi duis torquent, commodo varius. Magnis tristique consectetur tempus molestie, quisque placerat auctor amet scelerisque. Et enim auctor enim erat gravida magna. Lacus placerat metus senectus sociosqu gravida sociis vestibulum dui mauris ultrices dignissim. Augue faucibus viverra maecenas habitant fringilla gravida laoreet dui at dictumst purus non. Ligula malesuada sit litora luctus. Ultricies, laoreet montes aliquet nascetur mi lacinia hac commodo vestibulum. Fames ridiculus inceptos tortor at. Aliquam dignissim, dictum sit facilisi sollicitudin habitasse ridiculus torquent accumsan? Sagittis viverra bibendum aliquam. Integer arcu leo curae; quam ridiculus nullam dolor sagittis. Eget natoque orci faucibus tempor ut conubia fringilla turpis dui sed euismod. Sollicitudin eleifend rhoncus elementum nascetur viverra hac.
                    </p>
                    <p>
                    Tincidunt fermentum sed erat cum. Arcu purus dignissim quis arcu. Nascetur platea neque venenatis potenti et. Lectus gravida, vehicula varius malesuada volutpat conubia enim. Varius sem convallis auctor sodales mauris. Neque sagittis malesuada nec. Bibendum accumsan diam ad condimentum suscipit natoque libero auctor. Platea scelerisque massa est habitant cursus sit. Volutpat ullamcorper dignissim mattis interdum? Senectus primis euismod aliquam lacinia iaculis nisl non. Ipsum eleifend ridiculus per pulvinar etiam interdum pulvinar, maecenas in quisque ultrices litora! Praesent volutpat aenean mattis vehicula ultrices orci conubia ultricies turpis. Libero hendrerit nec nunc sem leo. Mattis adipiscing habitant dapibus.
                    </p>
                    <p>
                    Suscipit nascetur fusce tempus at lobortis magna odio! Vestibulum malesuada sociosqu quam ad eget neque sociosqu viverra nullam penatibus. Aptent tortor viverra bibendum nisl lectus eu quis rhoncus nascetur commodo. Suscipit ipsum consequat ullamcorper dui urna. Magnis vehicula aliquet fermentum! Malesuada sociosqu vestibulum mi habitant nostra, odio morbi. Pulvinar massa senectus sociosqu odio interdum blandit cursus id suscipit. Nam nam dui tristique penatibus aliquam, fusce montes. Cras netus egestas ultricies curae; accumsan curabitur turpis sollicitudin tempus felis! Penatibus mi risus, fusce porttitor. Vehicula fusce litora fermentum vestibulum donec, placerat nunc fermentum. Malesuada nam fusce primis aliquam lobortis nunc tortor pretium viverra. Non, mus euismod euismod. Lacus venenatis integer mi conubia porta id fermentum luctus. Mauris eu auctor proin turpis lacinia morbi. Potenti condimentum volutpat nostra a ultrices laoreet. Dignissim vestibulum lacinia diam malesuada sociosqu! Himenaeos faucibus nisl lacinia neque. Penatibus per at duis ultricies torquent facilisis.
                    </p>
                    <p>
                    Parturient vivamus cursus odio justo venenatis habitant tincidunt nam primis felis, proin tempor. Nascetur sem quis phasellus nostra. Adipiscing arcu aptent scelerisque libero fusce felis aenean dolor curae; aliquet dictumst. Sollicitudin porttitor taciti faucibus habitant vulputate conubia, neque senectus lacinia suscipit ac massa? Vehicula sapien duis adipiscing id enim nullam sollicitudin.
                    </p>
                    <p>
                    Fames rutrum potenti nascetur, semper ridiculus varius. Arcu morbi magnis curae; laoreet sit a vitae non ullamcorper auctor. Urna fames placerat, faucibus maecenas. Sapien est purus nisi amet at himenaeos taciti lorem. Habitasse felis aenean malesuada praesent pellentesque aliquam purus. Sodales molestie malesuada massa dignissim posuere. Lobortis inceptos arcu dapibus dapibus. Potenti purus consequat, dictumst auctor. Habitant, turpis aenean nascetur tortor accumsan aptent congue ultricies tellus. Neque, eleifend magnis a. Interdum.
                </p>'
        ];
        return [
            'title' => $this->faker->sentence,
            'body' => $body_data[rand(0, 2)],
            'category_id' => rand(1, 10),
            'is_published' => $this->faker->boolean(70),
            'is_featured' => $this->faker->boolean(20),
            'created_by' => 1,
            'clicks' => rand(0, 200),
            'created_at' => $this->faker->dateTimeBetween('-3 years'),
            'updated_at' => $this->faker->dateTimeBetween('-3 years'),
        ];
    }
}
