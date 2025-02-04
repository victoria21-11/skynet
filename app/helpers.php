<?php

    use App\Models\{
        GlobalSetting,
        Category,
        Tree,
        SocialNetwork,
    };

    function globalSetting($name)
    {
        $globalSetting = GlobalSetting::ofName($name)->published()->first();
        if($globalSetting) {
            return $globalSetting->value;
        }
        return $globalSetting;
    }

    function buildNavigation()
    {
        $navigation = session('navigation');
        if($navigation) {
            return $navigation;
        }
        $navigation = Tree::notTree()->with([
            'childrenTrees',
            'section',
        ])->get();
        session('navigation', $navigation);
        return $navigation;
    }

    function currenCategory()
    {
        $tree = Tree::ofUrl(request()->path())
            ->with([
                'childrenTrees',
                'parentTree'
            ])
            ->first();
        if($tree && $tree->tree_id) {
            if($tree->childrenTrees->isNotEmpty()) {
                return $tree->childrenTrees;
            }
            if($tree->parentTree && $tree->parentTree->tree_id) {
                return $tree->parentTree->childrenTrees;
            }
        }
        return null;
    }

    function socialNetworks() {
        return SocialNetwork::published()->get();
    }

    function prepareParams($params) {
        $result = [];
        foreach ($params as $key => $value) {
            $result[$value['name']] = $value['value'] ?? $value['default_value'];
        }
        return $result;
    }
