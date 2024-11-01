(function() {
    tinymce.PluginManager.add('ewhb_highlight_box_button', function( editor, url ) {
        editor.addButton( 'ewhb_highlight_box_button', {
            title: 'Custom Highlight Box',
           // type: 'menubutton',
		   type: "listbox",
            width: 150,
            icon: 'icon ewhb-highlight-box-icon',
            values: [
               
				
				
		
				
                {
                    text: 'Custom Highlight Box',
                    onclick: function() {
                        editor.windowManager.open( {
                            title: 'Insert Highlight Box',
							width: 700,
							height: 340,
                            body: [
							
							{
                                type: 'textbox',
                                name: 'content',
                                label: 'Your content',
								 multiline: true,
								 minWidth: 350,
								 minHeight: 150
                            },
							
				
                            {
                                type: 'listbox', 
                                name: 'level', 
                                label: 'Default Background', 
                                'values': [
                                   
                                    {text: 'Blue', value: 'wp-highlight-box-blue'},
									{text: 'Black', value: 'wp-highlight-box-black'},
									{text: 'White', value: 'wp-highlight-box-white'},
									{text: 'Gray', value: 'wp-highlight-box-gray'},
									{text: 'Red', value: 'wp-highlight-box-red'},
									{text: 'Green', value: 'wp-highlight-box-green'},
                                    {text: 'Yellow', value: 'wp-highlight-box-yellow'},
									{text: 'Customize', value: 'wp-highlight-box'}
                                   
                                ]
                            }
							,	
					
							
						{
						 type: 'ColorPicker',
						 name: 'SelectBackground',
						 label: 'Customize Background',
						 color: 'e6f2fa',
						 autofocus: true,
						 minHeight: 60,
						 minWidth: 60
						 
						},
                            {
                                type: 'ColorPicker',
                                name: 'Selectcolor',
                                label: 'Customize Color Text',
								 minHeight: 60,
								 color: 'fff',
						 minWidth: 60
                            }
							
							
							
							],
                            onsubmit: function( e ) {
                                editor.insertContent( '[highlight-box'  + ' class="'  +  e.data.level  +'"' + ' ' + 'style="'  + 'background:' + e.data.SelectBackground + ';' + 'color:' + e.data.Selectcolor + '"' +  ' content="' + e.data.content + '"' + ']');
                            }
                        });
                    }
                }
           ]
        });
    });
})();