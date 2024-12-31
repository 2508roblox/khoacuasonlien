(()=>{"use strict";const e=window.wp.hooks,t=window.wp.i18n,o=window.wp.element,a=window.qlwapp["admin-menu"],n=window.wp.data,c="qlwapp/menu/store",r=()=>{const{setSettingsWoocommerce:e,settingsWoocommerce:r,saveWoocommerceSettings:l}=function(){const{setSettingsWoocommerce:e,saveWoocommerceSettings:t}=(0,n.useDispatch)(c),{settingsWoocommerce:o,isResolvingSettingsWoocommerce:a,hasResolvedSettingsWoocommerce:r}=(0,n.useSelect)((e=>{const{getSettingsWoocommerce:t,isResolving:o,hasFinishedResolution:a}=e(c);return{settingsWoocommerce:t(),isResolvingSettingsWoocommerce:o("getSettingsWoocommerce"),hasResolvedSettingsWoocommerce:a("getSettingsWoocommerce")}}),[]);return{settingsWoocommerce:o,isResolvingSettingsWoocommerce:a,hasResolvedSettingsWoocommerce:r,hasSettingsWoocommerce:!(!r||!Object.keys(o)?.length),saveWoocommerceSettings:t,setSettingsWoocommerce:e}}(),m=t=>{const{name:o,value:a}=t.target;e({[o]:a})},s=[{value:"none",label:(0,t.__)("None","wp-whatsapp-chat")},{value:"woocommerce_before_add_to_cart_form",label:(0,t.__)('Before "Add To Cart" form',"wp-whatsapp-chat")},{value:"woocommerce_before_add_to_cart_button",label:(0,t.__)('Before "Add To Cart" button',"wp-whatsapp-chat")},{value:"woocommerce_after_add_to_cart_button",label:(0,t.__)('After "Add To Cart" button',"wp-whatsapp-chat")},{value:"woocommerce_after_add_to_cart_form",label:(0,t.__)('After "Add To Cart" form',"wp-whatsapp-chat")},{value:"woocommerce_product_additional_information",label:(0,t.__)('After "Additional information"',"wp-whatsapp-chat")}];return(0,o.createElement)(a.Tab,{settings:r,onSubmit:async()=>await l(r)},(0,o.createElement)("table",{className:"form-table"},(0,o.createElement)("tbody",null,(0,o.createElement)("tr",null,(0,o.createElement)("th",{scope:"row"},(0,t.__)("Position","wp-whatsapp-chat")),(0,o.createElement)("td",null,(0,o.createElement)("select",{name:"position",value:r.position,onChange:m},s.map((e=>(0,o.createElement)("option",{key:e.value,value:e.value},e.label)))))),(0,o.createElement)("tr",null,(0,o.createElement)("th",{scope:"row"},(0,t.__)("Position Priority","wp-whatsapp-chat")),(0,o.createElement)("td",null,(0,o.createElement)("input",{type:"number",step:"5",min:"-100",max:"100",name:"position_priority",placeholder:r.position_priority,value:r.position_priority,onChange:m}),(0,o.createElement)("p",{className:"description"},(0,o.createElement)("small",null,(0,t.__)("Position priority","wp-whatsapp-chat"))))))),(0,o.createElement)("hr",null),(0,o.createElement)(a.Button,{settings:r,onChange:m}))},l=[{label:(0,t.__)("WooCommerce","wp-whatsapp-chat"),name:"woocommerce",content:()=>{const{Fill:e}=(0,a.useAppSlotContext)();return(0,o.createElement)(o.Fragment,null,(0,o.createElement)(e.Header,null,(0,o.createElement)(a.Header,null)),(0,o.createElement)(e.Navigation,null,(0,o.createElement)(a.Nav,null)),(0,o.createElement)(e.Content,null,(0,o.createElement)(r,null)))}}];(0,e.addFilter)("wp-whatsapp-chat.app.tabs","wp-whatsapp-chat/app/tabs/woocommerce",(function(e){return e.splice(e.length-1,0,l[0]),e}),10,1),(window.qlwapp=window.qlwapp||{})["admin-menu-woocommerce"]={}})();