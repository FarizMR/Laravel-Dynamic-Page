<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Http\Request;

use App\Models\Role;
use App\Models\User;
use App\Models\Page;
use App\Models\Category;
use App\Models\Product;

class BaseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Role
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $roles = [
            'admin',
            'cashier',
        ];

        foreach($roles as $role) {
            Role::create(['name' => $role]);
        }

        $admin = User::create([
            'name' => 'Super Admin',
            'username' => 'admin',
            'password' => 'admin',
        ]);

        $cashier = User::create([
            'name' => 'Cashier',
            'username' => 'cashier',
            'password' => 'cashier',
        ]);

        $admin->assignRole('admin');
        $cashier->assignRole('cashier');

        // Page restoran
        $restoran = Page::create([
            'title' => 'Restoran',
        ]);

        // Restoran Category
        $cat_resto_1 = Category::create([
            'page_id' => $restoran->id,
            'title' => 'Makanan'
        ]);

        $product_1_cat_resto_1 = Product::create([
            'category_id' => $cat_resto_1->id,
            'name' => 'Sate',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In est.',
            'price' => 20000,
            'unit' => 'qty',
        ]);

        $product_2_cat_resto_1 = Product::create([
            'category_id' => $cat_resto_1->id,
            'name' => 'Bakso',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In est.',
            'price' => 15000,
            'unit' => 'qty',
        ]);

        $cat_resto_2 = Category::create([
            'page_id' => $restoran->id,
            'title' => 'Minuman'
        ]);

        $product_1_cat_resto_2 = Product::create([
            'category_id' => $cat_resto_2->id,
            'name' => 'Es Teh',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In est.',
            'price' => 3000,
            'unit' => 'qty',
        ]);

        $product_2_cat_resto_2 = Product::create([
            'category_id' => $cat_resto_2->id,
            'name' => 'Susu putih',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In est.',
            'price' => 5500,
            'unit' => 'qty',
        ]);



        // Page bengkel
        $bengkel = Page::create([
            'title' => 'Bengkel Jaya Abadi',
        ]);

        // Bengkel category
        $cat_bengkel_1 = Category::create([
            'page_id' => $bengkel->id,
            'title' => 'Reparasi',
        ]);

        $cat_bengkel_2 = Category::create([
            'page_id' => $bengkel->id,
            'title' => 'Lainnya',
        ]);

    }
}
