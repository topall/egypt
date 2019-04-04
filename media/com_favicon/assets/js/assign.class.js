(function($){
    var FavIconAssignClass = function(options) {
        var root = this;
        this.vars = {};
        this.icondefault = false;
        this.icons = [];
        this.assignments = {};
        this.assignmentMap = {};
        this.menus = {};
        var construct = function(options){
            root.icondefault = options.icondefault;
            root.icons = options.icons;
            root.assignments = options.assignments;
            options.menus.forEach(function(i){
                if(!Array.isArray(root.menus[i.p])) root.menus[i.p] = [];
                root.menus[i.p].push(i.i);
            });
            mapAssignments();
            decorateOptions();
        };
        var decorateOptions = function() {
            var options = $('#jform_menus option');
            options.css({'padding-left':'18px','height':'20px','display':'block'});
            if(root.icondefault) {
                var css = {
                    'background-image':imageValue(root.icondefault),
                    'background-repeat':'no-repeat'
                };
                options.css(css);
            }
            options.each(function(i,el){
                if(root.assignmentMap.hasOwnProperty(el.value)) {
                    var css = {
                        'background-image':imageValue(root.assignmentMap[el.value])
                    };
                    $(el).css(css);
                }
            });
        };
        var imageValue = function(id) {
            return 'url('+Joomla.getOptions('system.paths').base+'/index.php?option=com_favicon&task=favicon.image&id=' + id  + '&key=0)';
        };
        var mapAssignments = function() {
            Object.entries(root.assignments).forEach(function(o){
                var iconid = parseInt(o[0]);
                o[1].forEach(function(itemid){
                    root.assignmentMap[itemid]=iconid;
                    mapChildren(itemid,iconid);
                });
            });
        };
        var mapChildren = function(itemid,iconid){
            if(root.menus[itemid]) {
                root.menus[itemid].forEach(function(id){
                    root.assignmentMap[id]=iconid;
                    mapChildren(id,iconid);
                });
            }
        };
        construct(options);
    };
    $(document).ready(function(){
        window.faviconassign = new FavIconAssignClass(Joomla.getOptions('com_favicon_options'));
    });
})(jQuery);
