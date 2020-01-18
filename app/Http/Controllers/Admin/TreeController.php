<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{
    Tree,
};
use App\Http\Requests\Admin\Tree\{
    Index,
    Order
};

class TreeController extends Controller
{
    public function getTitle()
    {
        return trans('admin.trees.title');
    }

    public function index(Index $request)
    {
        $tree = Tree::notTree()->with('section', 'allChildrenTrees.section')->get();

        return view('admin.trees.index', [
            'title' => $this->getTitle(),
            'tree' => $tree,
        ]);
    }

    public function order(Order $request)
    {
        foreach ($request->get('order', []) as $value) {
            Tree::where('id', $value['id'])->update([
                'order' => $value['order']
            ]);
        }
        return response([]);
    }
}
