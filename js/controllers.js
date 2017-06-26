function TodoCtrl($scope){
    $scope.newItem="";
    $scope.todoList = [];

    $scope.addItem = function(){
        if(this.newItem){
            THIS.todoList.push({label:this.newItem});
            this.newItem = "";
        }
    }
}