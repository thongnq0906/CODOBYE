<?php
    namespace App\Http\Composers;

    use Illuminate\Contracts\View\View;
    use App\Models\Cate_product;
    use App\Models\Support;
    use App\Models\Post;

    class SidebarComposer
    {
        public function compose(View $view)
        {
            $cate_lv1 = Cate_product::where('status', 1)->where('parent_id', 0)->orderBy('position', 'ASC')->get();
            $view->with('cate_lv1', $cate_lv1);

            $support_sidebar = Support::where('status', 1)->get();
            $view->with('support_sidebar', $support_sidebar);

            $post_sidebar = Post::where('status', 1)->where('is_home', 1)->get();
            $view->with('post_sidebar', $post_sidebar);
        }
    }
