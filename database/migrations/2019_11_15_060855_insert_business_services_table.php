<?php

use App\BusinessService;
use App\UniversalSearch;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertBusinessServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

    $data = array(    

        array(
            'name'=>'Burger King','slug'=>'burger-king','description'=>'Fast Food Services',
            'price'=>25.00,'time'=>5.00,'time_type'=>'minutes',
            'discount'=>5.00,'discount_type'=>'percent','category_id'=>1,'location_id'=>2,
            'business_id'=>1,'booking_id'=>1,'image'=>null,'status'=>'active',
            'created_at'=>'2019-12-20 11:09:33','updated_at'=>'2019-12-20 11:09:33',
        ),

        array(
            'name'=>'Louis Vuitton','slug'=>'louis-vuitton','description'=>'Accessories Company Services',
            'price'=>25.00,'time'=>5.00,'time_type'=>'minutes',
            'discount'=>5.00,'discount_type'=>'percent','category_id'=>2,'location_id'=>3,
            'business_id'=>2,'booking_id'=>2,'image'=>null,'status'=>'active',
            'created_at'=>'2019-12-20 11:09:33','updated_at'=>'2019-12-20 11:09:33',
        ),

        array(
            'name'=>'Mc Donald','slug'=>'mc-donald','description'=>'Fast Food Services',
            'price'=>25.00,'time'=>5.00,'time_type'=>'minutes',
            'discount'=>5.00,'discount_type'=>'percent','category_id'=>8,'location_id'=>4,
            'business_id'=>1,'booking_id'=>1,'image'=>null,'status'=>'active',
            'created_at'=>'2019-12-20 11:09:33','updated_at'=>'2019-12-20 11:09:33',
        ),

        array(
            'name'=>'Dunkin Donuts','slug'=>'dunkin-donuts','description'=>'Fast Food Services',
            'price'=>25.00,'time'=>5.00,'time_type'=>'minutes',
            'discount'=>5.00,'discount_type'=>'percent','category_id'=>3,'location_id'=>2,
            'business_id'=>1,'booking_id'=>3,'image'=>null,'status'=>'active',
            'created_at'=>'2019-12-20 11:09:33','updated_at'=>'2019-12-20 11:09:33',
        ),

        array(
            'name'=>'Lacoste Shirt','slug'=>'lacoste-shirt','description'=>'Clothing Company Services',
            'price'=>25.00,'time'=>5.00,'time_type'=>'minutes',
            'discount'=>5.00,'discount_type'=>'percent','category_id'=>4,'location_id'=>5,
            'business_id'=>2,'booking_id'=>4,'image'=>null,'status'=>'active',
            'created_at'=>'2019-12-20 11:09:33','updated_at'=>'2019-12-20 11:09:33',
        ),

        array(
            'name'=>'Google Company','slug'=>'google-company','description'=>'Tech-Company Service',
            'price'=>25.00,'time'=>5.00,'time_type'=>'minutes',
            'discount'=>5.00,'discount_type'=>'percent','category_id'=>5,'location_id'=>6,
            'business_id'=>3,'booking_id'=>5,'image'=>null,'status'=>'active',
            'created_at'=>'2019-12-20 11:09:33','updated_at'=>'2019-12-20 11:09:33',
        ),

        array(
            'name'=>'Camella Homes','slug'=>'camella-homes','description'=>'Real State Property',
            'price'=>25.00,'time'=>5.00,'time_type'=>'minutes',
            'discount'=>5.00,'discount_type'=>'percent','category_id'=>6,'location_id'=>7,
            'business_id'=>4,'booking_id'=>6,'image'=>null,'status'=>'active',
            'created_at'=>'2019-12-20 11:09:33','updated_at'=>'2019-12-20 11:09:33',
        ),

        array(
            'name'=>'Honda Motorcycle','slug'=>'honda-motorcycle','description'=>'Motorcycle Replacement Services',
            'price'=>25.00,'time'=>5.00,'time_type'=>'minutes',
            'discount'=>5.00,'discount_type'=>'percent','category_id'=>7,'location_id'=>8,
            'business_id'=>5,'booking_id'=>7,'image'=>null,'status'=>'active',
            'created_at'=>'2019-12-20 11:09:33','updated_at'=>'2019-12-20 11:09:33',
        ),

    );

        DB::table('business_services')->insert($data);



    // $datas = array(    

    //     array(
    //         'searchable_id' => 9,'searchable_type' =>'Service','title' => 'Burger King',
    //         'route_name' => 'admin.business-services.edit',
    //         'created_at'=>'2019-12-20 11:09:33','updated_at'=>'2019-12-20 11:09:33',
    //     ),
    //     array(
    //         'searchable_id' => 10,'searchable_type' =>'Service','title' => 'Louis Vuitton',
    //         'route_name' => 'admin.business-services.edit',
    //         'created_at'=>'2019-12-20 11:09:33','updated_at'=>'2019-12-20 11:09:33',
    //     ),
    //     array(
    //         'searchable_id' => 11,'searchable_type' =>'Service','title' => 'Mc Donald',
    //         'route_name' => 'admin.business-services.edit',
    //         'created_at'=>'2019-12-20 11:09:33','updated_at'=>'2019-12-20 11:09:33',
    //     ),
    //     array(
    //         'searchable_id' => 12,'searchable_type' =>'Service','title' => 'Dunkin Donuts',
    //         'route_name' => 'admin.business-services.edit',
    //         'created_at'=>'2019-12-20 11:09:33','updated_at'=>'2019-12-20 11:09:33',
    //     ),
    //     array(
    //         'searchable_id' => 13,'searchable_type' =>'Service','title' => 'Google Company',
    //         'route_name' => 'admin.business-services.edit',
    //         'created_at'=>'2019-12-20 11:09:33','updated_at'=>'2019-12-20 11:09:33',
    //     ),
    //     array(
    //         'searchable_id' => 14,'searchable_type' =>'Service','title' => 'Camella Homes',
    //         'route_name ' => 'admin.business-services.edit',
    //         'created_at'=>'2019-12-20 11:09:33','updated_at'=>'2019-12-20 11:09:33',
    //     ),
    //     array(
    //         'searchable_id' => 15,'searchable_type' =>'Service','title' => 'Honda Motorcycle',
    //         'route_name' => 'admin.business-services.edit',
    //         'created_at'=>'2019-12-20 11:09:33','updated_at'=>'2019-12-20 11:09:33',
    //     ),    
    // );

    //     DB::table('universal_searches')->insert($datas);


    // add services searchable entries
        $services = BusinessService::select('id', 'name')->get();
        if ($services->count() > 0) {
            foreach ($services as $service) {
                $universal_search = new UniversalSearch();

                $universal_search->searchable_id = $service->id;
                $universal_search->searchable_type = 'Service';
                $universal_search->title = $service->name;
                $universal_search->route_name = 'admin.business-services.edit';

                $universal_search->save();
            }
        }
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
