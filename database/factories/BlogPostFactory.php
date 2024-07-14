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
            "
            <h1>The Future of Solar: Emerging Technologies in Photovoltaics</h1>
            <h2>Perovskite Solar Cells</h2>
            <h3>Bifacial Solar Panels</h3>
            <h4>Solar Skin Design</h4>
            <p>
                As a leader in solar energy solutions, we're always looking ahead to the next big innovations in the industry. Today, we're excited to share some of the emerging technologies that are set to revolutionize solar power.
            </p>
            <p>
                Perovskite solar cells are a promising new technology that could significantly increase the efficiency of solar panels while reducing costs. These cells can be manufactured using simple and inexpensive techniques, potentially making solar energy even more accessible.
            </p>
            <p>
                Bifacial panels can capture sunlight from both sides, increasing energy production by up to 30% compared to traditional panels. This technology is particularly effective in certain installations, such as on reflective surfaces or in large solar farms.
            </p>
            <p>
                For homeowners concerned about aesthetics, solar skin technology allows solar panels to blend in with your roof. This custom design solution can match your roof's color and pattern while still delivering efficient energy production.
            </p>
            <p>
                As these technologies continue to develop, we're committed to bringing the best solar solutions to our customers. Stay tuned for updates as we incorporate these innovations into our product offerings!
            </p>",
        
            "
            <h1>Maximizing Your Solar Investment: Tips for Optimal Panel Performance</h1>
            <p>
                You've made the smart choice to invest in solar energy. Now, let's ensure you're getting the most out of your system with these practical tips for optimal performance.
            </p>
            <h2>1. Keep Your Panels Clean</h2>
            <p>
                Regular cleaning can increase your panels' efficiency by up to 5%. We recommend a gentle cleaning with water and a soft brush at least twice a year.
            </p>
            <h2>2. Monitor Your System's Output</h2>
            <p>
                Use your monitoring system to track your energy production. If you notice a significant drop, it could indicate a problem that needs attention.
            </p>
            <h2>3. Trim Overhanging Branches</h2>
            <p>
                Keep trees trimmed to prevent shading on your panels. Even partial shade can significantly reduce a panel's output.
            </p>
            <h2>4. Consider a System Upgrade</h2>
            <p>
                If your system is more than 10 years old, newer technologies could significantly boost your energy production. Contact us for a free assessment of your current system.
            </p>
            <p>
                Remember, our maintenance team is always here to help keep your system in top shape. Schedule your annual check-up today!
            </p>",
        
            "
            <h1>Solar Battery Storage: Is It Right for Your Home?</h1>
            <table>
                <tr>
                    <th>Benefit</th>
                    <th>Description</th>
                </tr>
                <tr>
                    <td>Energy Independence</td>
                    <td>Use stored solar power during outages</td>
                </tr>
                <tr>
                    <td>Maximize Self-Consumption</td>
                    <td>Use your own solar energy even when the sun isn't shining</td>
                </tr>
            </table>
            <h2>Benefits of Solar Battery Storage</h2>
            <p>
                As solar technology advances, more homeowners are considering adding battery storage to their systems. But is it the right choice for you? Let's explore the benefits and considerations.
            </p>
            <h3>Considerations</h3>
            <p>
                While battery storage offers many benefits, it's important to consider factors such as:
            </p>
            <ul>
                <li>Initial cost and return on investment</li>
                <li>Your current and future energy needs</li>
                <li>Local utility policies and net metering rates</li>
            </ul>
            <p>
                Every home's energy needs are unique. Our expert team can help you determine if battery storage is the right addition to your solar system. Contact us for a personalized assessment!
            </p>",
        
            "
            <h1>Going Green and Saving Green: Solar Tax Incentives for Homeowners</h1>
            <p>
                <strong>Investing in solar energy isn't just good for the environment - it's also great for your wallet</strong>, especially when you factor in available tax incentives.
            </p>
            <h2>Federal Solar Investment Tax Credit (ITC)</h2>
            <p>
                <em>The federal government offers a significant tax credit for solar installations.</em> In 2023, you can deduct 30% of the cost of your solar system from your federal taxes.
            </p>
            <h3>State-Specific Incentives</h3>
            <ul>
                <li>Property tax exemptions for solar installations</li>
                <li>Performance-based incentives</li>
                <li>Solar Renewable Energy Credits (SRECs)</li>
            </ul>
            <h4>Act Now to Maximize Your Savings</h4>
            <p>
                While these incentives are fantastic, they won't last forever. The federal ITC is set to decrease in the coming years, so now is the perfect time to go solar.
            </p>
            <h5>Ready to Start Saving?</h5>
            <p>
                Contact us for a free consultation and learn how much you could save with solar!
            </p>",
        
            "
            <h1>Solar Myths Debunked: Separating Fact from Fiction</h1>
            <h2>Myth 1: Solar Panels Don't Work in Cold or Cloudy Climates</h2>
            <p>
                Fact: Solar panels can actually be more efficient in cooler temperatures. While cloud cover can reduce output, modern panels are designed to work even in less-than-ideal conditions.
            </p>
            <h3>Myth 2: Solar Installations Damage Your Roof</h3>
            <p>
                Fact: When installed correctly by professionals, solar panels can actually protect your roof from wear and tear. Our installation process ensures your roof's integrity is maintained.
            </p>
            <h4>Myth 3: Solar Is Too Expensive</h4>
            <p>
                Fact: While there is an upfront cost, solar systems pay for themselves over time through energy savings. With available incentives and financing options, solar is more affordable than ever.
            </p>
            <h5>Myth 4: Solar Panels Require a Lot of Maintenance</h5>
            <p>
                Fact: Solar panels are relatively low-maintenance. Regular cleaning and occasional check-ups are usually all that's needed to keep your system running efficiently.
            </p>
            <h6>Have More Questions?</h6>
            <p>
                We're here to provide clear, honest information. Contact us to learn more about how solar can work for you!
            </p>",
        ];
        return [
            'title' => $this->faker->sentence,
            'body' => $body_data[rand(0, 4)],
            'is_published' => $this->faker->boolean(70),
            'is_featured' => $this->faker->boolean(20),
            'created_by' => 1,
            'clicks' => rand(0, 200),
            'created_at' => $this->faker->dateTimeBetween('-3 years'),
            'updated_at' => $this->faker->dateTimeBetween('-3 years'),
        ];
    }
}