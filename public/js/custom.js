/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

"use strict";

function handleDelete(url) {
    swal({
        title: "Are you sure?",
        text: "Deleted data will be lost.",
        type: "warning",
        buttons: true
    }).then((result) => {
        if (result) {
            $('.delete-form').attr('action', url)
            $('.delete-form').submit()
        }
    })
}
