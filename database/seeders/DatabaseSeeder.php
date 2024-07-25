<?php

namespace Database\Seeders;

use App\Models\Calificacion;
use App\Models\Categoria;
use App\Models\MetodoDePago;
use App\Models\Pedido;
use App\Models\Producto;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        /*
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        */
        $admin = User::create([
            "name" => "Admin User",
            "email" => "admin@example.com",
            "password" => bcrypt('12345678')
        ]);
        $user = User::create([
            "name" => "Test User",
            "email" => "test@example.com",
            "password" => bcrypt('12345678')
        ]);
        $adminRole = Role::create(['name' => 'admin']);
        $userRole = Role::create(['name' => 'user']);
        Permission::create(['name' => 'categoria.index']);
        Permission::create(['name' => 'categoria.create']);
        Permission::create(['name' => 'categoria.edit']);
        Permission::create(['name' => 'categoria.destroy']);
        $adminRole->syncPermissions([
            'categoria.index',
            'categoria.create',
            'categoria.edit',
            'categoria.destroy',
        ]);
        
        $userRole->syncPermissions([
            'categoria.index',
        ]);
        $admin->assignRole($adminRole);
        $user->assignRole($userRole);

        Categoria::create([
            'nombre' => 'celulares',
            'descripcion' => 'marcas y modelos',
        ]);
        Categoria::create([
            'nombre' => 'Parlantes',
            'descripcion' => 'marcas y modelos',
        ]);
        Categoria::create([
            'nombre' => 'Cargadores',
            'descripcion' => 'V8/C',
        ]);
        Categoria::create([
            'nombre' => 'Audifonos',
            'descripcion' => 'Inalambricos',
        ]);
        Categoria::create([
            'nombre' => 'cargador portatil',
            'descripcion' => 'Panel solar',
        ]);
        Categoria::create([
            'nombre' => 'Fundas',
            'descripcion' => 'Personalizadas',
        ]);
        MetodoDePago::create([
            'nombre' => 'Tarjeta de Credito',
            'descripcion' => 'BNB, PRODEM, VISA',
        ]);
        MetodoDePago::create([
            'nombre' => 'PayPal',
            'descripcion' => 'Pago Seguro',
        ]);
        MetodoDePago::create([
            'nombre' => 'Transferencia Bancaria',
            'descripcion' => 'QR',
        ]);
        MetodoDePago::create([
            'nombre' => 'Tarjeta de Debito',
            'descripcion' => 'BNB, PRODEM, VISA, UNION, ECOFUTURO, MCZ',
        ]);
        Producto::create([
            'nombre' =>'samsung',
            'descripcion' =>'celulares',
            'precio' =>1500,
            'stock' =>30,
            'categoria_id'=>1,
        ]);
        Producto::create([
            'nombre' =>'INFINIX',
            'descripcion' =>'celulares',
            'precio' =>1200,
            'stock' =>20,
            'categoria_id'=>1,
        ]);
        Producto::create([
            'nombre' =>'TECNO',
            'descripcion' =>'celulares',
            'precio' =>900,
            'stock' =>35,
            'categoria_id'=>1,
        ]);
        Producto::create([
            'nombre' =>'TOMATE',
            'descripcion' =>'parlante',
            'precio' =>150,
            'stock' =>40,
            'categoria_id'=>2,
        ]);
        Producto::create([
            'nombre' =>'EWTON',
            'descripcion' =>'parlante',
            'precio' =>180,
            'stock' =>30,
            'categoria_id'=>2,
        ]);
        Producto::create([
            'nombre' =>'ZONY',
            'descripcion' =>'parlante',
            'precio' =>250,
            'stock' =>30,
            'categoria_id'=>2,
        ]);
        Producto::create([
            'nombre' =>'E&F',
            'descripcion' =>'parlante',
            'precio' =>170,
            'stock' =>30,
            'categoria_id'=>2,
        ]);
        Producto::create([
            'nombre' =>'E&F',
            'descripcion' =>'Cargador V8/C',
            'precio' =>30,
            'stock' =>80,
            'categoria_id'=>3,
        ]);
        Producto::create([
            'nombre' =>'samsung',
            'descripcion' =>'Cargador V8/C',
            'precio' =>50,
            'stock' =>70,
            'categoria_id'=>3,
        ]);
        Producto::create([
            'nombre' =>'Tecno',
            'descripcion' =>'Cargador V8/C',
            'precio' =>35,
            'stock' =>100,
            'categoria_id'=>3,
        ]);
        Producto::create([
            'nombre' =>'INFINIX',
            'descripcion' =>'Cargador V8/C',
            'precio' =>40,
            'stock' =>70,
            'categoria_id'=>3,
        ]);
        Producto::create([
            'nombre' =>'EWTOM',
            'descripcion' =>'Cargador V8/C',
            'precio' =>60,
            'stock' =>30,
            'categoria_id'=>3,
        ]);
        Producto::create([
            'nombre' =>'TOMATE',
            'descripcion' =>'Auriculares',
            'precio' =>120,
            'stock' =>50,
            'categoria_id'=>4,
        ]);
        Producto::create([
            'nombre' =>'XIAOMI',
            'descripcion' =>'Auriculares',
            'precio' =>180,
            'stock' =>60,
            'categoria_id'=>4,
        ]);
        Producto::create([
            'nombre' =>'PSS',
            'descripcion' =>'Auriculares',
            'precio' =>150,
            'stock' =>30,
            'categoria_id'=>4,
        ]);
        Producto::create([
            'nombre' =>'Samsung',
            'descripcion' =>'Fundas',
            'precio' =>30,
            'stock' =>80,
            'categoria_id'=>5,
        ]);
        Producto::create([
            'nombre' =>'Tecno',
            'descripcion' =>'Fundas',
            'precio' =>40,
            'stock' =>30,
            'categoria_id'=>5,
        ]);
        Producto::create([
            'nombre' =>'INFINIX',
            'descripcion' =>'Fundas',
            'precio' =>35,
            'stock' =>70,
            'categoria_id'=>5,
        ]);
        Producto::create([
            'nombre' =>'XIA0MI',
            'descripcion' =>'Fundas',
            'precio' =>50,
            'stock' =>50,
            'categoria_id'=>5,
        ]);
        Calificacion::create([
            'calificacion' => 5,
            'comentario' => 'Excelente',
            'producto_id' => 1,
        ]);
        Calificacion::create([
            'calificacion' => 4,
            'comentario' => 'Muy bueno',
            'producto_id' => 1,
        ]);
        Calificacion::create([
            'calificacion' => 4,
            'comentario' => 'Ta Bien',
            'producto_id' => 2,
        ]);
        Calificacion::create([
            'calificacion' => 5,
            'comentario' => 'Toy triste :,v',
            'producto_id' => 1,
        ]);
        Calificacion::create([
            'calificacion' => 3,
            'comentario' => 'Pues ta regular',
            'producto_id' => 1,
        ]);
        Pedido::create([
            'cantidad' => 2,
            'user_id' => 1,
            'producto_id' => 1,
            'metodo_de_pago_id' => 1,
        ]);
        Pedido::create([
            'cantidad' => 3,
            'user_id' => 1,
            'producto_id' => 2,
            'metodo_de_pago_id' => 2,
        ]);
        Pedido::create([
            'cantidad' => 1,
            'user_id' => 1,
            'producto_id' => 3,
            'metodo_de_pago_id' => 3,
        ]);
        Pedido::create([
            'cantidad' => 1,
            'user_id' => 1,
            'producto_id' => 1,
            'metodo_de_pago_id' => 1,
        ]);
        Pedido::create([
            'cantidad' => 1,
            'user_id' => 1,
            'producto_id' => 1,
            'metodo_de_pago_id' => 1,
        ]);
        
    }
    
}
