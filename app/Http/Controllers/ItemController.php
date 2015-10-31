<?php

    namespace App\Http\Controllers;

    class ItemController extends ApiController {
        // TODO: Find a way to generate and store item tag information from all items and save (JSON) that allows for filtering via JS

        /**
         * Gets all the items and returns a view with the items attached
         *
         * @return $this
         */
        public function getAllItems() {
            $url = $this->buildURL("static-data", "euw", "item", "itemListData=all");
            $items = $this->apiCall($url);
            $items = json_decode($items, true);
            $itemTags = self::generateItemTagsArray($items);
            return view("partials.champion.tabs.items")->with(
                ["itemData" => $items,
                 "itemTags" => $itemTags,
                ]
            );

        }

        private function generateItemTagsArray($items) {
            $itemTags = [];
            foreach ($items['data'] as $item) {
                if(isset($item['tags'])) {
                    foreach ($item['tags'] as $tag) {
                        array_push($itemTags, $tag);
                    }
                }
            }
            asort($itemTags);
            return array_unique($itemTags);
        }

    }
