<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Role;

class RoleFactory extends Factory
{
    protected $model = Role::class;

    private static $roles = ['Customer', 'Seller', 'Admin'];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Retrieve the current role based on the static array index
        $roleName = self::getRoleName();

        return [
            'name' => $roleName,
        ];
    }

    /**
     * Get the role name based on the static index.
     *
     * @return string
     */
    private static function getRoleName(): string
    {
        // Use the static index to get the role
        static $index = 0;

        // Get the role based on the current index
        $roleName = self::$roles[$index % count(self::$roles)];

        // Increment the index for the next call
        $index++;

        return $roleName;
    }
}
