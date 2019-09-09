<?php
/**
 * Created by PhpStorm.
 * User: maunil
 * Date: 30-03-2017
 * Time: 23:06
 */
?>
<div class="row">
    <div class="col s6">
        <div class="col s2">Project ID</div>
        <div class="col s10">Job Name</div>
        <ul id="project-list"></ul>
        <div class="container center">
            <button class="btn" id="load-more" data-val="0">
                Load more..
            </button>
        </div>
    </div>
    <div class="col s6">
        <?php
        echo form_open('projectController/addProject');
        ?>
        <div class="row">
            <div class="input-field col s10">
                <input type="number" name="pid" class="validate" id="addpid">
                <label for="addpid">Project ID</label>
            </div>
            <div class="input-field col s10">
                <input type="text" name="pname" id="addpname" class="validate">
                <label for="addpname">Job Name</label>
            </div>
            <div class="col s10">
                <input type="submit" value="Add" class="btn center">
            </div>
        </div>
        <?php
        echo form_close();
        ?>

        <?php
        echo form_open('projectController/searchProject');
        ?>
        <div class="row">
            <div class="input-field col s6">
                <input type="number" name="pid" id="searchpid" value="<?php echo isset($searchedProject[0]->pid) ? ($searchedProject[0]->pid) : (""); ?>">
                <label for="searchpid">Project ID</label>
            </div>
            <div class="input-field col s6">
                <input type="submit" value="Search" class="btn center">
            </div>
        </div>
        <?php
        echo form_close();
        ?>

        <?php
        echo form_open('projectController/updateProject');
        ?>
        <input type="hidden" name="pid" value="<?php echo isset($searchedProject[0]->pid) ? ($searchedProject[0]->pid) : (""); ?>">
        <div class="row">
            <div class="input-field col s6">
                <input type="text" name="pname" id="updatepname" value="<?php echo isset($searchedProject[0]->pname) ? ($searchedProject[0]->pname) : (""); ?>">
                <label for="updatepname">Job Name</label>
            </div>
            <div class="input-field col s6">
                <input type="submit" value="Update" class="btn center">
            </div>
        </div>
        <?php
        echo form_close();
        ?>

        <?php
        echo form_open('projectController/deleteProject');
        ?>
        <input type="hidden" name="pid" value="<?php echo isset($searchedProject[0]->pid) ? ($searchedProject[0]->pid) : (""); ?>">
        <input type="submit" value="Delete" class="btn center" disabled>
        <?php
        echo form_close();
        ?>
    </div>
</div>

<script>
    $(function () {
        var loadMoreProjects = function (page) {
            $("#loader").show();
            $.ajax({
                data: {
                    page: page
                },
                url: "<?php echo base_url() ?>projectController/loadMoreProjects",
                type: 'POST'
            }).done(function (response) {
                $("#project-list").append(response);
                $('#load-more').data('val', ($('#load-more').data('val') + 1));
            });
        };
        loadMoreProjects(0);

        $("#load-more").click(function (e) {
            e.preventDefault();
            var page = $(this).data('val');
            loadMoreProjects(page);

        });
    });
</script>
</body>
</html>