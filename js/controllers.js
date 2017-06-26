function TodoCtrl($scope){
    $scope.newItem="";
    $scope.todoList = [];

    $scope.addItem = function(){
        if(this.newItem){
            this.todoList.push({label:this.newItem});
            this.newItem = "";
        }
    }
}