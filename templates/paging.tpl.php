<div class="d-flex" align="center">
     <ul class="pagination mx-auto" id="paging">
         <div class="text-center">
             Puslapiai: </div>
        <?php foreach ($paging->data as $key => $value) {
            $activeClass = "";
            if($value['isActive'] == 1) {
                $activeClass = " class='active'";
            }
            echo "<li class='page-item' {$activeClass} ><a class='page-link' href='index.php?module={$module}&action=list&page={$value['page']}' title=''>{$value['page']}</a></li>";
        } ?>
    </ul>
</div>