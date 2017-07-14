<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BlogController extends BaseController{

	public function getBlogHome(){
		return "Hello World ! Welcome. ";
	}

	public function getBlog($id){

		$result = DB::select('select * from blogs where id = ?', array($id));

		return response()->json($result);
	}

	public function getAllBlog(){

		$result = DB::select('select * from blogs');

		return response()->json($result);
	}

	public function createBlog(Request $request){

		$id = $request->input('id');
		$title = $request->input('title');
		$blog = $request->input('blog');
		$creator = $request->input('creator');

		DB::insert('insert into blogs values (?, ?, ?, ?, now())', [$id, $title, $blog, $creator]);

		return "Done";
	}

}