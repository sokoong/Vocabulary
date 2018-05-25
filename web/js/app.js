var app = angular.module('app', []);
app.directive('onEnter', function () {
    return function (scope, element, attrs) {
        element.bind("keydown keypress", function (event) {
            if(event.which === 13) {
                scope.$apply(function (){
                    scope.$eval(attrs.onEnter);
                });
                event.preventDefault();
            }
        });
    };
});
app.directive('ngFocus', function($timeout) {
    return {
        link: function ( scope, element, attrs ) {
            scope.$watch( attrs.ngFocus, function ( val ) {
                if ( angular.isDefined( val ) && val ) {
                    $timeout( function () { element[0].focus(); } );
                }
            }, true);

            element.bind('blur', function () {
                if ( angular.isDefined( attrs.ngFocusLost ) ) {
                    scope.$apply( attrs.ngFocusLost );

                }
            });
        }
    };
});
app.controller('AppController', function() {
	this.init = function() {
		this.total = words.length;
		this.correct = 0;
		this.wrong = 0;
		if(window.location.search == '?try'){
			this.quiz = true;
			this.perpage = 1;
			this.current = 1;
			this.currentText = [];
			this.words = words.slice(0, 1);
		}else{
			this.quiz = false;
			this.perpage = 100;
			this.current = 1;
			this.currentText = [];
			this.words = words.slice(0, 100);
		}
	};
	this.loadmore = function() {
		this.current += 1;
		this.perpage = 100;
		this.words = words.slice(0, this.current*this.perpage);
	}
	this.submit = function(key, word) {
		me = this;
		n = me.currentText.length;
		if(me.currentText[key] && me.currentText[n-1] && me.current <= n){
			me.current += 1;
			me.words = words.slice(0, me.current*me.perpage);
			var arr = word[2].split(', ');
			var res = arr.find(function(value){
				return (value == me.currentText[key]);
			});
			if(res){
				this.correct += 1;
				word[4] = true;
			}else{
				this.wrong += 1;
				word[4] = false;
			}
			word[3] = word[2];
		}else if(me.current > n){
			word[3] = word[2];
		}
	}
});