class Notification {

    success() {
        new Noty({
            type: 'success',
            layout: "topRight",
            text: 'Successfully done!',

        }).show();
    }


    alert() {
        new Noty({
            type: 'alert',
            layout: "topRight",
            text: 'Are You Sure ?',

        }).show();
    }


    error() {
        new Noty({
            type: 'alert',
            layout: "topRight",
            text: 'Somthing Went Wrong !',

        }).show();
    }

    warning() {
        new Noty({
            type: 'warning',
            layout: "topRight",
            text: 'Opps Wrong !',

        }).show();
    }


    image_validation() {
        new Noty({
            type: 'error',
            layout: "topRight",
            text: 'Upload Image less than 1 MB !',

        }).show();
    }


    cart_success() {
        new Noty({
            type: 'success',
            layout: "topRight",
            text: 'Successfully Add to Cart!',

        }).show();
    }




    cart_delete() {
        new Noty({
            type: 'success',
            layout: "topRight",
            text: 'Successfully Deleted!',

        }).show();
    }

}

export default Notification = new Notification()