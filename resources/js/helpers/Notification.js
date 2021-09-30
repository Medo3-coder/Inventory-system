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

}

export default Notification = new Notification()