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

        $body_data = '{"ops":[{"insert":"Heading 1"},{"attributes":{"header":1},"insert":"\n"},{"insert":"Heading 2"},{"attributes":{"header":2},"insert":"\n"},{"insert":"Heading 3"},{"attributes":{"header":3},"insert":"\n"},{"insert":"Heading 4"},{"attributes":{"header":4},"insert":"\n"},{"insert":"Heading 5"},{"attributes":{"header":5},"insert":"\n"},{"insert":"Heading 6\nLorem ipsum dolor sit, amet consectetur adipisicing elit. Sapiente numquam at iusto quo quas quia quasi ut velit natus autem consequatur, sint cum? Provident delectus sapiente minima, soluta labore obcaecati.\nLorem ipsum dolor, sit amet consectetur adipisicing elit. Cumque, impedit laudantium magnam, dolorem sunt asperiores maxime numquam reprehenderit ab iste ducimus. Cum nostrum doloribus iste placeat. Fuga quis velit explicabo soluta sit vero quod quo et rem dignissimos voluptatum nam quas, at odit numquam voluptatem eligendi voluptates. Commodi, exercitationem obcaecati! Quod ab eius est expedita saepe beatae temporibus, non nihil quibusdam amet modi autem explicabo quas voluptatum dignissimos quam dolor. At nobis hic reprehenderit! Similique, officiis reprehenderit eius, hic ut tenetur aliquam vero molestiae sed quibusdam amet. Natus, et? Officia distinctio deleniti dolores corrupti ad sunt ducimus eum, explicabo aperiam vitae temporibus perspiciatis odio incidunt, ipsum sed quae amet vero, corporis quo dolor adipisci quia! Eius expedita recusandae, ad nisi aut qui alias error excepturi fugit quia earum temporibus minus id deserunt molestiae nam delectus vel mollitia praesentium amet. Consequuntur repudiandae, inventore cupiditate amet laboriosam vitae tenetur, minus ipsam quam est eligendi accusantium nostrum saepe error ipsum, cumque vero enim sit illum architecto atque provident eum! Nulla, quibusdam incidunt provident veniam ab dolorum quae quia doloribus labore distinctio fugiat, cum, eligendi temporibus consectetur nesciunt cumque eum sint ipsam ipsum quam asperiores saepe quidem repellendus omnis. Veritatis officia enim pariatur excepturi? Quos omnis aliquid quam dignissimos optio adipisci, quia tempora voluptate, laboriosam dolorem sit ab saepe, dolor autem! Dolore aperiam obcaecati non officia? Minus aliquam soluta quasi officiis, mollitia quis molestias quas praesentium id quisquam, similique maiores beatae quia eaque, incidunt quos impedit. In atque illum dignissimos corrupti earum. Minus, praesentium debitis inventore ab quia odio aliquam obcaecati ipsum vitae veritatis officia quam laboriosam eveniet ex aliquid odit nihil voluptate labore esse! Non reiciendis quam nostrum dolorum atque deleniti tempora tenetur, omnis nemo, amet tempore laudantium voluptatibus ipsa, aspernatur ratione quisquam laborum itaque dolore? Laboriosam accusamus eum assumenda repellendus et libero?\n"},{"attributes":{"bold":true},"insert":"Bold"},{"insert":"\n"},{"attributes":{"italic":true},"insert":"Italic"},{"insert":"\n"},{"attributes":{"underline":true},"insert":"Underline"},{"insert":"\n"},{"attributes":{"italic":true},"insert":"List"},{"insert":"\none"},{"attributes":{"list":"ordered"},"insert":"\n"},{"insert":"two"},{"attributes":{"list":"ordered"},"insert":"\n"},{"insert":"three"},{"attributes":{"list":"ordered"},"insert":"\n"},{"insert":"Quote data lorem test hey hello"},{"attributes":{"blockquote":true},"insert":"\n"}]}';
        return [
            'title' => $this->faker->sentence,
            'body' => $body_data,
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