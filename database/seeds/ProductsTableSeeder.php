<?php

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
/**
 * Run the database seeds.
 *
 * @return void
 */
public function run()
{

Product::create(['name'=>'Chemise cintre','category_id'=>'1','price_display'=>'3,90€','price_value'=>'3.90','delay'=>'J+1', 'vat'=>'20',]);
Product::create(['name'=>'Chemise Pliée','category_id'=>'1','price_display'=>'4,40€','price_value'=>'4.40','delay'=>'J+1', 'vat'=>'20', ]);
Product::create(['name'=>'Pull','category_id'=>'1','price_display'=>'4,80€','price_value'=>'4.80','delay'=>'J+1', 'vat'=>'20', ]);
Product::create(['name'=>'Pantalon','category_id'=>'1','price_display'=>'4,80€','price_value'=>'4.80','delay'=>'J+1', 'vat'=>'20', ]);
Product::create(['name'=>'Veste','category_id'=>'1','price_display'=>'6,90€','price_value'=>'6.90','delay'=>'J+1', 'vat'=>'20', ]);
Product::create(['name'=>'Costume','category_id'=>'1','price_display'=>'11,70€','price_value'=>'11.70','delay'=>'J+1', 'vat'=>'20', ]);
Product::create(['name'=>'Cravate/Echarpe','category_id'=>'1','price_display'=>'11,70€','price_value'=>'11.70','delay'=>'J+1', 'vat'=>'20', ]);
Product::create(['name'=>'Couette 1 pers','category_id'=>'2','price_display'=>'16,00€','price_value'=>'16.00','delay'=>'J+3', 'vat'=>'20', ]);
Product::create(['name'=>'Couette 2 pers','category_id'=>'2','price_display'=>'22,00€','price_value'=>'22.00','delay'=>'J+3', 'vat'=>'20', ]);
Product::create(['name'=>'Oreiller','category_id'=>'2','price_display'=>'8,00€','price_value'=>'8.00','delay'=>'J+3', 'vat'=>'20', ]);
Product::create(['name'=>'Drap / Drap Housse','category_id'=>'2','price_display'=>'4,50€','price_value'=>'4.50','delay'=>'J+3', 'vat'=>'20', ]);
Product::create(['name'=>'Taie oreiller','category_id'=>'2','price_display'=>'2,50€','price_value'=>'2.50','delay'=>'J+3', 'vat'=>'20', ]);
Product::create(['name'=>'Pack Draps (2 taies + Housse couette + Drap housse)','category_id'=>'2','price_display'=>'12,80€','price_value'=>'12.80','delay'=>'J+3', 'vat'=>'20', ]);
Product::create(['name'=>'Couverture / dessus de lit','category_id'=>'2','price_display'=>'14,00€','price_value'=>'14.00','delay'=>'J+3', 'vat'=>'20', ]);
Product::create(['name'=>'Voilage','category_id'=>'2','price_display'=>'4€/m2','delay'=>'J+3', 'vat'=>'20', ]);
Product::create(['name'=>'Rideaux simples','category_id'=>'2','price_display'=>'6€/m2','delay'=>'J+3', 'vat'=>'20', ]);
Product::create(['name'=>'Rideaux doubles','category_id'=>'2','price_display'=>'8€/m2','delay'=>'J+3', 'vat'=>'20', ]);
Product::create(['name'=>'Tapis','category_id'=>'2','price_display'=>'14€/m2','delay'=>'J+3', 'vat'=>'20', ]);
Product::create(['name'=>'Articles en plume sur devis','category_id'=>'2','price_display'=>'devis','delay'=>'J+3', 'vat'=>'20', ]);
Product::create(['name'=>'Repassage chemise','category_id'=>'3','price_display'=>'3,07€','price_value'=>'3.07','delay'=>'J+3', 'vat'=>'20', ]);
Product::create(['name'=>'Repassage Kilo','category_id'=>'3','price_display'=>'5,36€','price_value'=>'5.36','delay'=>'J+3', 'vat'=>'20', ]);
Product::create(['name'=>'Recoudre un bouton','category_id'=>'4','price_display'=>'1,11€','price_value'=>'1.11','delay'=>'J+5', 'vat'=>'20', ]);
Product::create(['name'=>'Ourlet Pantalon','category_id'=>'4','price_display'=>'à partir de 8,84€','delay'=>'J+5', 'vat'=>'20', ]);
Product::create(['name'=>'Ourlet Jupe','category_id'=>'4','price_display'=>'à partir de 13,42€','delay'=>'J+5', 'vat'=>'20', ]);
Product::create(['name'=>'Fermeture éclair','category_id'=>'4','price_display'=>'à partir de 11,11€','delay'=>'J+5', 'vat'=>'20', ]);
Product::create(['name'=>'Duplication clé simple','category_id'=>'5','price_display'=>'7,00€','price_value'=>'7.00','delay'=>'J+1', 'vat'=>'20', ]);
Product::create(['name'=>'Duplication clé à point Iseo','category_id'=>'5','price_display'=>'19,00€','price_value'=>'19.00','delay'=>'J+1', 'vat'=>'20', ]);
Product::create(['name'=>'Talons homme','category_id'=>'5','price_display'=>'14,80€','price_value'=>'14.80','delay'=>'J+3', 'vat'=>'20', ]);
Product::create(['name'=>'Patins de protection homme','category_id'=>'5','price_display'=>'16,80€','price_value'=>'16.80','delay'=>'J+3', 'vat'=>'20', ]);
Product::create(['name'=>'Patins de protection femme','category_id'=>'5','price_display'=>'14,80€','price_value'=>'14.80','delay'=>'J+3', 'vat'=>'20', ]);
Product::create(['name'=>'Talons femme','category_id'=>'5','price_display'=>'11,80€','price_value'=>'11.80','delay'=>'J+3', 'vat'=>'20', ]);
Product::create(['name'=>'Talons aiguilles','category_id'=>'5','price_display'=>'7,00€','price_value'=>'7.00','delay'=>'J+3', 'vat'=>'20', ]);
Product::create(['name'=>'ressemelage meteor dame','category_id'=>'5','price_display'=>'26,80€','price_value'=>'26.80','delay'=>'J+3', 'vat'=>'20', ]);
Product::create(['name'=>'ressemelage meteor homme','category_id'=>'5','price_display'=>'36,80€','price_value'=>'36.80','delay'=>'J+3', 'vat'=>'20', ]);
Product::create(['name'=>'<20mn','category_id'=>'6','price_display'=>'à partir de 7€','delay'=>'SUR RDV', 'vat'=>'20', ]);
Product::create(['name'=>'<30mn','category_id'=>'6','price_display'=>'à partir de 10€','delay'=>'SUR RDV', 'vat'=>'20', ]);
Product::create(['name'=>'Selon les bons de commande','category_id'=>'7','price_display'=>'selon demande','delay'=>'CHAQUE SEMAINE', 'vat'=>'20', ]);
}
}
