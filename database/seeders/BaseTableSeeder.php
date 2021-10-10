<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Http\Request;

use App\Models\Role;
use App\Models\User;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

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

        $request = new Request();

        $page_controller = new PageController();
        $category_controller = new CategoryController();
        $product_controller = new ProductController();

        // Page restoran
        $request->replace([
            'title' => 'Restoran',
        ]);
        $restoran = $page_controller->create($request);

        // Restoran Category
        $request->replace([
            'page_id' => $restoran->id,
            'title' => 'Makanan',
        ]);
        $cat_resto_1 = $category_controller->create($request);

        $request->replace([
            'category_id' => $cat_resto_1->id,
            'name' => 'Sate',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In est.',
            'price' => 20000,
            'unit' => 'qty',
        ]);
        $product_1_cat_resto_1 = $product_controller->create($request);

        $request->replace([
            'category_id' => $cat_resto_1->id,
            'name' => 'Bakso',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In est.',
            'price' => 15000,
            'unit' => 'qty',
        ]);
        $product_2_cat_resto_1 = $product_controller->create($request);

        $request->replace([
            'page_id' => $restoran->id,
            'title' => 'Minuman',
        ]);
        $cat_resto_2 = $category_controller->create($request);

        $request->replace([
            'category_id' => $cat_resto_2->id,
            'name' => 'Es Teh',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In est.',
            'price' => 3000,
            'unit' => 'qty',
        ]);
        $product_1_cat_resto_2 = $product_controller->create($request);

        $request->replace([
            'category_id' => $cat_resto_2->id,
            'name' => 'Susu putih',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In est.',
            'price' => 5500,
            'unit' => 'qty',
        ]);
        $product_2_cat_resto_2 = $product_controller->create($request);



        // Page bengkel
        $request->replace([
            'title' => 'Bengkel Jaya Abadi',
        ]);
        $bengkel = $page_controller->create($request);

        // Bengkel category
        $request->replace([
            'page_id' => $bengkel->id,
            'title' => 'Servis',
        ]);
        $cat_bengkel_1 = $category_controller->create($request);

        $request->replace([
            'page_id' => $bengkel->id,
            'title' => 'Lainnya',
        ]);
        $cat_bengkel_2 = $category_controller->create($request);


    }
}
