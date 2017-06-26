function TodoCtrl($scope){
    $scope.newItem="";
    $scope.todoList = [{label: "新事項"}, {label: "阿明"}];

    $scope.addItem = function(){
        if(this.newItem){
            THIS.todoList.push({label: this.newItem});
            this.newItem="";
        }
    }
}