<?php

use Faker\Generator as Faker;

$factory->define(App\Actividad::class, function (Faker $faker) {
	$rand_user = App\User::where('jefe', TRUE)->where('cuenta', '<>', 'admin')->get()->random();
	$user = App\Oficina::find($rand_user->oficina_id)->users()->where('cuenta', '<>', 'admin')->get()->random();
    return [
		'nombre' => $faker->sentence(2),
		'estado' => $faker->randomElement(['I', 'E', 'C', 'F']),
		'presupuesto' => $faker->randomFloat(2, 1000, 10000),
		'fecha_creacion'=>\Carbon\Carbon::now()->subDays(rand(0,45)), //+rand(0,45)
		'fecha_inicio' => $faker->date('Y-m-d', 'now + 30 days'),
		'fecha_fin_esperada' => $faker->date('Y-m-d', 'now + 30 days'),
		'fecha_fin' => $faker->date('Y-m-d', 'now + 30 days'),
		'numero_resolucion' => $faker->numerify('###-2018-VRINV'),
		'fecha_resolucion' => $faker->date('Y-m-d', 'now + 30 days'),
		'fecha_acta' => $faker->date('Y-m-d', 'now + 30 days'),
		'descripcion_acta' => $faker->text(255),
		'creador_id' => $rand_user->id,
		'monitor_id' => $user->id,
    ];
});
