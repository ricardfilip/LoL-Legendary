<?php

    namespace app\Http\Controllers;

    use Illuminate\Routing\Controller;
    use App\Http\Controllers\ItemController;

    /**
     * Class responsible for handling tab behaviours inside champion details tab
     */
    class TabController extends Controller {
        /**
         * Responds to the tab/{query} route
         * @param string $tabSlug
         *
         * @return \Illuminate\View\View Returns the method call on the appropriate controller
         */
        public function displayTab($tabSlug) {
            switch ($tabSlug){
                case "items":
                    //Run getAllItems Method from the items controller (returns a view)
                    return (new ItemController)->getAllItems();
                    break;
                case "runes":
                    return "runes view";
                    break;
                case "masteries":
                    return "masteries view";
                    break;
                case "graphs":
                    return "NYI";
                    break;
            }
        }
    }