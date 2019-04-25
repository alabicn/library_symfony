
      $(document).ready(function(){
        $(".show").click(function(){
          $(".admin__edit-form").show()+
          $(".show").hide()+
          $(".hide").show();
        });
        $(".hide").click(function(){
          $(".admin__edit-form").hide()+
          $(".show").show()+
          $(".hide").hide();
        });
      });