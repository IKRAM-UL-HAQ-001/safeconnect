(function($) {
    "use strict"

    
    Morris.Donut({
        element: 'morris_donught',
        data: [{
            label: "\xa0 \xa0 Download Sales \xa0 \xa0",
            value: 12,

        }, {
            label: "\xa0 \xa0 In-Store Sales \xa0 \xa0",
            value: 30
        }, {
            label: "\xa0 \xa0 Mail-Order Sales \xa0 \xa0",
            value: 20
        }],
        resize: true,
        colors: ['#75B432', 'rgb(192, 10, 39)', '#4400eb']
    });
    

//donught chart
    Morris.Donut({
        element: 'morris_donught_2',
        data: [{
            label: "\xa0 \xa0 Download Sales \xa0 \xa0",
            value: 12,

        }, {
            label: "\xa0 \xa0 In-Store Sales \xa0 \xa0",
            value: 30
        }, {
            label: "\xa0 \xa0 Mail-Order Sales \xa0 \xa0",
            value: 20
        }],
        resize: true,
        colors: ['#75B432', 'rgb(192, 10, 39)', '#4400eb']
    });
    
})(jQuery);