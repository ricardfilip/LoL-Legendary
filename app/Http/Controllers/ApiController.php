<?php 
namespace App\Http\Controllers;
use Illuminate\Routing\Controller;

class ApiController extends Controller {
	public function getApiVersion(){
		echo "version 1.69 (giggity)";
	}
	
}