import "./editor.scss"
import "./style.scss"

wp.blocks.registerBlockType("ourplugin/usermetaselect", {
  title: "User Meta Select",
  icon: "heart",
  category: "widgets",
  attributes: {
    choice: {type: "string"}
  },
  edit: editComponent,
  save: function(){
    return null
  }
}
)

function editComponent(props){

  return (
    <div className="select-container">
       <select onChange={e=>props.setAttributes({choice: e.target.value})}>
          <option value=''>Select the user data to be displayed: </option>
          <option value='1' selected={props.attributes.choice == 1 } >First Name</option>
          <option value='2' selected={props.attributes.choice == 2 } >Last Name</option>
          <option value='3' selected={props.attributes.choice == 3 } >Username</option>
          <option value='4' selected={props.attributes.choice == 4 } >User Email</option>
       </select>
    </div>
  )
}
