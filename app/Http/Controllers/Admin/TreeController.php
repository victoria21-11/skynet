<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{
    Tree,
    Section,
};
use App\Http\Requests\Admin\Tree\{
    Index,
    Order,
    Store,
    Delete,
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

    public function store(Store $request)
    {
        $tree = Tree::create($request->validated());
        return response([
            'tree' => $tree->load('section')
        ]);
    }

    public function destroy(Delete $request, Tree $tree)
    {
        $tree->childrenTrees()->delete();
        $tree->delete();
        return response([]);
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

    public function sections(Request $request)
    {
        $sections = Section::get();
        return response([
            'sections' => $sections
        ]);
    }
}
