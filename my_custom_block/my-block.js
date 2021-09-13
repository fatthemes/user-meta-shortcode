wp.blocks.registerBlockType( 'snigdha/mycustomblock', {
  title: 'My Custom Block',
  icon: 'smiley',
  category: 'widgets',
  attributes: {
    message: { type: 'string'}
    },
  edit: function(props){
    function updateContent(event){
      props.setAttributes({message: event.target.value})
    }

    return wp.element.createElement("div", null,
    wp.element.createElement("input", {
      type: "text",
      value: props.attributes.message,
      onChange: updateContent
    })
    );
  },
  save: function(props) {
    return wp.element.createElement("h3", null, props.attributes.message);
  }

  }
)
