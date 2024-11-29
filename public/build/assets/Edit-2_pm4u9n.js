import{t as S,r as C,T as j,o as F,B,d as m,e as u,f as l,j as f,g as e,u as o,l as V,v as p,x as _,L as E,F as h,q as I,y as N,k as U,s as z}from"./app-Bggvsate.js";import{_ as A}from"./AuthenticatedLayout-Dw-NYtN5.js";import{_ as g}from"./InputError-DKCkpr5B.js";import{u as D}from"./useFileSizeCheck-imJxUYqy.js";import"./ApplicationLogo-CGKtPefA.js";import"./_plugin-vue_export-helper-DlAUqK2U.js";import"./Dropdown-Zr03yGGL.js";const M=e("h2",{class:"font-semibold text-xl text-gray-800 leading-tight"},"Services",-1),T={class:"py-12"},$={class:"max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-5"},q={class:"flex justify-start"},L=e("i",{class:"fa-solid fa-arrow-left mr-2"},null,-1),H=e("span",null,"Go Back",-1),P={class:"bg-white overflow-hidden shadow-sm sm:rounded-lg flex flex-col"},R={class:"w-full bg-white rounded-md p-4 shadow-md space-y-2"},G={class:"grid grid-cols-1 sm:grid-cols-2 gap-4"},O={class:"col-span-1"},J=e("label",{for:"form-name",class:"block text-lg font-medium text-gray-700"},"Service Name",-1),K={class:"col-span-1"},Q=e("label",{for:"category",class:"block text-lg font-medium text-gray-700"},"Select Category",-1),W=e("option",{disabled:"",value:""},"Category",-1),X=["value"],Y={class:"grid grid-cols-1 sm:grid-cols-1 gap-4"},Z={class:"grid grid-cols-1 sm:grid-cols-2 gap-4"},ee={class:"col-span-1"},se=e("label",{for:"description",class:"block text-lg font-medium text-gray-700"},"Description",-1),te={class:"col-span-1"},oe={class:"flex justify-between items-center"},ae=e("label",{for:"image",class:"block text-lg font-medium text-gray-700"},[U("Image "),e("span",{class:"text-xs"},"(max 1 image upload)")],-1),re={class:"flex justify-between items-center mt-2"},ie={class:"bg-main-500 p-1 px-2 rounded-lg text-white hover:bg-main-600"},le=e("label",{for:"file-upload",class:"flex cursor-pointer"},[e("i",{class:"fa-solid fa-plus text-xl"}),e("span",{class:"ml-1 hidden sm:flex items-center"},"Add Image")],-1),ne={class:"bg-gray-300 rounded-lg w-full h-56 mt-3 flex items-center justify-center overflow-hidden"},de={key:0,class:"relative"},ce=["src"],me=e("i",{class:"fa-solid fa-times"},null,-1),ue=[me],be={__name:"Edit",props:{service:{type:Object,required:!0},categories:{type:Array,required:!0}},setup(v){const r=v,c=S(),{checkFileSize:x}=D(1.5),i=C([]),s=j({name:r.service.name||"",category_id:r.service.category_id||"",description:r.service.description||"",image:[]});function b(d){const a=d.target.files;if(a.length>0){const n=a[0];if(x(n)){i.value=[],s.image=[];const t=new FileReader;t.onload=k=>{i.value.push(k.target.result),s.image.push(n)},t.readAsDataURL(n)}else c.error(`File "${n.name}" exceeds the 1.5 MB size limit.`)}}function y(){i.value=[],s.image=[],document.getElementById("file-upload").value="",c.info("Image removed. Save changes to confirm deletion.")}function w(){s.post(route("admin.services.update",r.service.id),{preserveScroll:!0,onSuccess:()=>{c.success("Service updated successfully!"),s.reset(),i.value=[]},onError:d=>{console.error(d),c.error("Failed to update service. Please check the form and try again.")}})}return F(()=>{r.service.image&&i.value.push(`/storage/${r.service.image}`),s.clearErrors()}),(d,a)=>{const n=B("Head");return m(),u(h,null,[l(n,{title:"Admin: Services"}),l(A,null,{header:f(()=>[M]),default:f(()=>[e("div",T,[e("div",$,[e("div",q,[l(o(V),{class:"bg-main-500 px-4 py-2 rounded-md text-white hover:bg-main-600",href:d.route("admin.services.index")},{default:f(()=>[L,H]),_:1},8,["href"])]),e("div",P,[e("div",R,[e("div",G,[e("div",O,[J,p(e("input",{id:"form-name",class:"w-full mt-1 p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent","onUpdate:modelValue":a[0]||(a[0]=t=>o(s).name=t),type:"text"},null,512),[[_,o(s).name]]),l(g,{class:"mt-2",message:o(s).errors.name},null,8,["message"])]),e("div",K,[Q,p(e("select",{id:"category",class:"w-full mt-1 p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent","onUpdate:modelValue":a[1]||(a[1]=t=>o(s).category_id=t)},[W,(m(!0),u(h,null,I(r.categories,t=>(m(),u("option",{key:t.id,value:t.id},N(t.service_category),9,X))),128))],512),[[E,o(s).category_id]]),l(g,{class:"mt-2",message:o(s).errors.category_id},null,8,["message"])])]),e("div",Y,[e("div",Z,[e("div",ee,[se,p(e("textarea",{class:"mt-1 w-full h-60 p-5 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent resize-none","onUpdate:modelValue":a[2]||(a[2]=t=>o(s).description=t)},null,512),[[_,o(s).description]]),l(g,{class:"mt-2",message:o(s).errors.description},null,8,["message"])]),e("div",te,[e("div",oe,[ae,l(g,{class:"",message:o(s).errors.image},null,8,["message"]),e("div",re,[e("div",ie,[e("input",{type:"file",onChange:b,class:"hidden",id:"file-upload"},null,32),le])])]),e("div",ne,[i.value.length?(m(),u("div",de,[e("img",{src:i.value[0],class:"w-36 h-36 object-cover rounded-lg"},null,8,ce),e("button",{onClick:y,class:"absolute top-0 right-0 bg-red-500 h-8 w-8 text-white rounded-full p-1 transform translate-x-1/2 -translate-y-1/2"},ue)])):z("",!0)])])]),e("div",{class:"flex justify-end mt-5"},[e("button",{type:"submit",placeholder:"",class:"bg-main-500 p-3 text-white rounded-lg hover:bg-main-600",onClick:w}," Update ")])])])])])])]),_:1})],64)}}};export{be as default};
