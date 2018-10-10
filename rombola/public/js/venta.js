$("[name='checkbox1']").change(function() {
      if(!confirm('Do you wanna cancel me!')) {
        this.checked = true;
      }
    });
    
    $("[name='checkbox1']").bootstrapSwitch();

    $("[name='checkbox1']").bootstrapSwitch({
          on: 'On',
          off: 'Off ',
          onLabel: '&nbsp;&nbsp;&nbsp;',
          offLabel: '&nbsp;&nbsp;&nbsp;',
          same: false,//same labels for on/off states
          size: 'md',
          onClass: 'primary',
          offClass: 'default'
        });
        