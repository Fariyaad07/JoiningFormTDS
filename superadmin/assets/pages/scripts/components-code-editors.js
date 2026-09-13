var ComponentsCodeEditors = function () {
    
    var handleDemo100 = function () {
        var myTextArea = document.getElementById('code_editor_demo_100');
        var myCodeMirror = CodeMirror.fromTextArea(myTextArea, {
            lineNumbers: true,
            matchBrackets: true,
            styleActiveLine: true,
            theme:"ambiance",
            mode: 'html'
        });
    }
	
    var handleDemo1001 = function () {
        var myTextArea = document.getElementById('code_editor_demo_1001');
        var myCodeMirror = CodeMirror.fromTextArea(myTextArea, {
            lineNumbers: true,
            matchBrackets: true,
            styleActiveLine: true,
            theme:"ambiance",
            mode: 'html'
        });
    }
	
    var handleDemo1002 = function () {
        var myTextArea = document.getElementById('code_editor_demo_1002');
        var myCodeMirror = CodeMirror.fromTextArea(myTextArea, {
            lineNumbers: true,
            matchBrackets: true,
            styleActiveLine: true,
            theme:"neon",
            mode: 'html'
        });
    }



    return {
        //main function to initiate the module
        init: function () {
            handleDemo100();
            handleDemo1001();
            handleDemo1002();
        }
    };

}();

jQuery(document).ready(function() {    
   ComponentsCodeEditors.init(); 
});