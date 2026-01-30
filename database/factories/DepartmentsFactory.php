<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Departments>
 */
class DepartmentsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $departments = [
            ['name' => 'Human Resources', 'code' => 'HRD'],
            ['name' => 'Finance', 'code' => 'FIN'],
            ['name' => 'Accounting', 'code' => 'ACC'],
            ['name' => 'Information Technology', 'code' => 'IT'],
            ['name' => 'Engineering', 'code' => 'ENG'],
            ['name' => 'UI/UX Design', 'code' => 'UX'],
            ['name' => 'Marketing', 'code' => 'MKT'],
            ['name' => 'Sales', 'code' => 'SLS'],
            ['name' => 'Customer Support', 'code' => 'CS'],
            ['name' => 'Operations', 'code' => 'OPS'],
            ['name' => 'Quality Assurance', 'code' => 'QA'],
        ];

        return $this->faker->unique()->randomElement($departments);
    }
}
