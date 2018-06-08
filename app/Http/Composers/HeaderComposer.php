<?php
    namespace App\Http\Composers;

    use Illuminate\Contracts\View\View;
    use Cart;

    class HeaderComposer
    {
        public function compose(View $view)
        {
            $view->with('total', Cart::total());
            $view->with('count', Cart::count());
        }
    }
