<div class="modal fade" id="exampleModalCenter<?= $category['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="width: 800px;">
            <div class="modal-body">
                <img src="<?=BASE?>/dist/img/categories/<?= $category['image'] ?>" alt="" width="500px">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>