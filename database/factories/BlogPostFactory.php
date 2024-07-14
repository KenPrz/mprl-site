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
                <p>
                    Kane alfred alcor ali lucius doom. Dent charlatan faith superman batmobile ghul society zucco owl calendar penguin. Owl creeper huntress shade chill face.
                </p>
                <blockquote>
                    "Raatko batman arkham jason grey knight oracle outsider. Green tally maxie abbott deathstroke ventriloquist gordon atomic batmobile, smoke cypher ragdoll?"
                </blockquote>
                <ul>
                    <li>Firefly bruce oracle pit prey elongated calendar batcave lantern temblor.</li>
                    <li>Ragman nyssa jim fox croc?</li>
                    <li>Superman carmine moth killer carmine harvey anarky batarang pennyworth.</li>
                </ul>
                <h2>Heading 2</h2>
                <p>
                    Angel silvermane magneto, ricochet lilandra titania invaders janefoster. Nighthawk bucky, satana moleculeman scarletspider dust.
                </p>
                <p>
                    Rand spectrum skaar morbius hydra snowbird gorillaman deathlok. Arcade natasha riptide spider-woman greengoblin prism pryde harrier stature titania johnnyblaze constrictor.
                </p>
                <h3>Heading 3</h3>
                <ol>
                    <li>Posuere enim litora varius natoque ac primis donec at praesent imperdiet.</li>
                    <li>Nec phasellus volutpat elit, viverra rhoncus vestibulum ante dui ullamcorper diam eleifend.</li>
                    <li>Sociosqu turpis ad quis semper luctus praesent.</li>
                </ol>
                <p>
                    Montes odio senectus mollis consectetur. Class massa quis elit vivamus hendrerit potenti tempor at at.
                </p>
                <h4>Heading 4</h4>
                <p>
                    Vehicula proin sit velit! Taciti lacus gravida porttitor a? Mus adipiscing natoque eu potenti viverra purus platea tincidunt hac.
                </p>
                <p>
                    Ultrices maecenas cras facilisi sapien? Habitant massa lectus imperdiet proin sodales? Magna aenean est mattis luctus vitae fames neque sociosqu scelerisque.
                </p>'
            ,
            '
                <h1>Heading 1</h1>
                <table>
                    <tr>
                        <th>Character</th>
                        <th>Description</th>
                    </tr>
                    <tr>
                        <td>Kane</td>
                        <td>alfred alcor ali lucius doom.</td>
                    </tr>
                    <tr>
                        <td>Dent</td>
                        <td>charlatan faith superman batmobile ghul society zucco owl calendar penguin.</td>
                    </tr>
                </table>
                <h2>Heading 2</h2>
                <p>
                    Abbott spoiler canary, diamond wing azrael rupert scarecrow fright. Gargoyle maxie creeper knight.
                </p>
                <h3>Heading 3</h3>
                <p>
                    Sinestro arkham nyssa bruce joe two shiva shrike arkham league chimera elongated. Luthor fright batarang lazarus wing elongated!
                </p>
                <blockquote>
                    "Harley chase huntress damian harlequin bennett batcave freeze."
                </blockquote>
                <p>
                    Todd oracle barrow kobra killer cobblepot shade league anarky? Kane charlatan justice owl fright maroni oswald atom of grundy justice grundy checkmate.
                </p>
                <h4>Heading 4</h4>
                <p>
                    Bartok zeus amanda outsider. Batarang spoiler croc aiko czonk hatter blink deathstroke harley superman thomas.
                </p>
                <p>
                    Abdullah ventriloquist wayne; temblor justice fright lynx. Strange poison ragdoll metallo joe cluemaster bullock shiva mask atkins clayface cobblepot harlequin.
                </p>
                <h5>Heading 5</h5>
                <p>
                    Montes odio senectus mollis consectetur. Class massa quis elit vivamus hendrerit potenti tempor at at.
                </p>
                <h6>Heading 6</h6>
                <p>
                    Gamora braddock constrictor stick chamber, madrox maximus? Kingpin brood professorx archangel x-statix archangel arnim yellowjacket contessa invaders elektra madrox.
                </p>'
            ,

            '
            <h1>Heading 1</h1>
            <p>
                <strong>Kane alfred alcor ali lucius doom.</strong> Dent charlatan faith superman batmobile ghul society zucco owl calendar penguin. Owl creeper huntress shade chill face.
            </p>
            <h2>Heading 2</h2>
            <p>
                <em>Abbott spoiler canary, diamond wing azrael rupert scarecrow fright.</em> Gargoyle maxie creeper knight. Sinestro arkham nyssa bruce joe two shiva shrike arkham league chimera elongated. Luthor fright batarang lazarus wing elongated!
            </p>
            <h3>Heading 3</h3>
            <ul>
                <li>Firefly bruce oracle pit prey elongated calendar batcave lantern temblor.</li>
                <li>Ragman nyssa jim fox croc?</li>
                <li>Superman carmine moth killer carmine harvey anarky batarang pennyworth.</li>
            </ul>
            <h4>Heading 4</h4>
            <p>
                Todd oracle barrow kobra killer cobblepot shade league anarky? Kane charlatan justice owl fright maroni oswald atom of grundy justice grundy checkmate.
            </p>
            <h5>Heading 5</h5>
            <p>
                Bartok zeus amanda outsider. Batarang spoiler croc aiko czonk hatter blink deathstroke harley superman thomas.
            </p>
            <h6>Heading 6</h6>
            <p>
                Gamora braddock constrictor stick chamber, madrox maximus? Kingpin brood professorx archangel x-statix archangel arnim yellowjacket contessa invaders elektra madrox.
            </p>'

        ];
        return [
            'title' => $this->faker->sentence,
            'body' => $body_data[rand(0, 3)],
            'is_published' => $this->faker->boolean(70),
            'is_featured' => $this->faker->boolean(20),
            'created_by' => 1,
            'clicks' => rand(0, 200),
            'created_at' => $this->faker->dateTimeBetween('-3 years'),
            'updated_at' => $this->faker->dateTimeBetween('-3 years'),
        ];
    }
}