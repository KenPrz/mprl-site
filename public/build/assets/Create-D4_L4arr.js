import{s as F,T as U,r as w,o as $,d as g,e as f,f as i,u as o,Z as E,i as u,g as e,k as M,j as y,p as T,h as N,t as b,v as z,x as A,q as D,y as k,F as V,m as P}from"./app-D7Jmbt7w.js";import{_ as q}from"./AuthenticatedLayout-kfdYhZci.js";import{_ as p}from"./InputError-SRVMLVH8.js";import{_ as C}from"./Toggle-BtyNddJ8.js";import{s as L,V as R}from"./vue-multiselect.css_vue_type_style_index_0_src_true_lang-D6rBXH5H.js";import{E as H}from"./Editor-BD0f4ueL.js";import{u as W}from"./useFileSizeCheck-CL4MT8ii.js";import{_ as Z}from"./_plugin-vue_export-helper-DlAUqK2U.js";import"./ApplicationLogo-B1oXeGrB.js";import"./Dropdown-BtlqRfQV.js";const a=m=>(T("data-v-5869180c"),m=m(),N(),m),G=a(()=>e("h2",{class:"font-semibold text-xl text-gray-800 leading-tight"},"Create Blog",-1)),J={class:"py-12"},K={class:"flex flex-col space-y-5 max-w-7xl mx-auto sm:px-6 lg:px-8"},O={class:"flex justify-start"},Q={class:"w-full bg-white rounded-md p-4 shadow-md space-y-2"},X={class:"flex-row sm:flex sm:items-center sm:space-x-4"},Y={class:"sm:w-3/4"},ee=a(()=>e("label",{for:"form-title",class:"block text-lg font-medium text-gray-700"},"Title",-1)),se=["disabled"],te={class:"sm:w-1/4"},oe=a(()=>e("label",{for:"categories",class:"block text-lg font-medium text-gray-700"},"Categories",-1)),le={key:0,class:"multiselect__single"},ie={class:"flex space-x-3"},ae=a(()=>e("label",{for:"is_published",class:"block text-lg font-medium text-gray-700"},"Published",-1)),re=a(()=>e("label",{for:"is_featured",class:"block text-lg font-medium text-gray-700"},"Featured",-1)),ne={class:"mb-4"},de=a(()=>e("label",{for:"images",class:"block text-lg font-medium text-gray-700 mb-2"}," Images (max 1.5 MB each) ",-1)),ce={class:"relative"},me=["disabled"],ue=a(()=>e("label",{for:"images",class:"flex items-center justify-center w-full px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm cursor-pointer hover:bg-gray-50 focus-within:outline-none focus-within:ring-2 focus-within:ring-blue-500 focus-within:border-transparent"},[e("svg",{class:"w-5 h-5 mr-2 text-gray-400",fill:"none",stroke:"currentColor",viewBox:"0 0 24 24",xmlns:"http://www.w3.org/2000/svg"},[e("path",{"stroke-linecap":"round","stroke-linejoin":"round","stroke-width":"2",d:"M12 6v6m0 0v6m0-6h6m-6 0H6"})]),e("span",null,"Choose images")],-1)),ge=a(()=>e("p",{class:"mt-1 text-sm text-gray-500"}," Select one or more image files ",-1)),fe={class:"flex flex-wrap mt-4"},pe=["onClick"],he=a(()=>e("i",{style:{color:"red"},class:"pi pi-times-circle"},null,-1)),_e=[he],be=["src"],xe={class:"mt-4 flex justify-end"},ve=["disabled"],we=a(()=>e("i",{class:"pi pi-plus pe-2"},null,-1)),ye=["disabled"],ke={class:"bg-white overflow-hidden shadow-sm sm:rounded-lg w-full p-2"},Ve={class:"flex justify-center mt-4"},Ce=["disabled"],Se=a(()=>e("i",{style:{"font-size":"1.2rem"},class:"pi pi-arrow-circle-up me-2"},null,-1)),Be=a(()=>e("span",{class:"text-lg font-semibold"},"Submit",-1)),Ie=[Se,Be],je={__name:"Create",props:{categories:{type:Array,required:!0}},setup(m){const h=F(),S=m,s=U({images:[],categories:[],title:"",content:"",is_published:!0,is_featured:!1}),_=w("Write your blog content here..."),r=w([]),{checkFileSize:B}=W(1.5);function x(n){const l=n.target.files,t=[],d=[];Array.from(l).forEach(c=>{if(B(c)){t.push(c);const v=new FileReader;v.onload=j=>{d.push(j.target.result),d.length===t.length&&(s.images.push(...t),r.value.push(...d))},v.readAsDataURL(c)}else h.error(`File "${c.name}" exceeds the 1.5 MB size limit.`)})}function I(){s.content=_.value,s.categories=s.categories.map(n=>n.id),s.post(route("admin.blog.store"),{preserveScroll:!0,onSuccess:()=>{h.success("Blog post created successfully!"),s.reset(),r.value=[]},onError:n=>{h.error("There was an error creating the blog post. Please check the form and try again.")}})}return $(()=>{s.clearErrors()}),(n,l)=>(g(),f(V,null,[i(o(E),{title:"Create Blog"}),i(q,null,{header:u(()=>[G]),default:u(()=>[e("div",J,[e("div",K,[e("div",O,[i(o(M),{class:"bg-main-400 px-2 py-1 rounded-md text-white hover:bg-main-500 mb-2",href:n.route("admin.blog.index")},{default:u(()=>[y(" Back ")]),_:1},8,["href"])]),e("div",Q,[e("div",X,[e("div",Y,[ee,b(e("input",{disabled:o(s).processing,id:"form-title",class:"w-full mt-1 p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent","onUpdate:modelValue":l[0]||(l[0]=t=>o(s).title=t),type:"text"},null,8,se),[[z,o(s).title]]),i(p,{class:"mt-2",message:o(s).errors.title},null,8,["message"])]),e("div",te,[oe,i(o(L),{modelValue:o(s).categories,"onUpdate:modelValue":l[1]||(l[1]=t=>o(s).categories=t),options:S.categories,multiple:!0,"close-on-select":!1,"clear-on-select":!1,"preserve-search":!0,placeholder:"Select categories",label:"name","track-by":"id","preselect-first":!1},{selection:u(({values:t,search:d,isOpen:c})=>[t.length&&!c?(g(),f("span",le,A(t.length)+" categories selected ",1)):D("",!0)]),_:1},8,["modelValue","options"]),i(p,{class:"mt-2",message:o(s).errors.categories},null,8,["message"])]),e("div",ie,[e("div",null,[ae,i(C,{modelValue:o(s).is_published,"onUpdate:modelValue":l[2]||(l[2]=t=>o(s).is_published=t)},null,8,["modelValue"])]),e("div",null,[re,i(C,{modelValue:o(s).is_featured,"onUpdate:modelValue":l[3]||(l[3]=t=>o(s).is_featured=t)},null,8,["modelValue"])])])]),b(e("div",ne,[de,e("div",ce,[e("input",{disabled:o(s).processing,id:"images",type:"file",multiple:"",onChange:x,class:"hidden"},null,40,me),ue,ge])],512),[[k,r.value.length<1]]),e("div",fe,[i(o(R),{modelValue:r.value,"onUpdate:modelValue":l[4]||(l[4]=t=>r.value=t),tag:"div",class:"flex flex-wrap"},{default:u(()=>[(g(!0),f(V,null,P(r.value,(t,d)=>(g(),f("div",{key:d,class:"w-1/4 p-2"},[e("button",{onClick:c=>r.value.splice(d,1),class:"relative top-0 right-0"},_e,8,pe),e("img",{src:t,class:"w-full h-auto rounded-md shadow-md cursor-move"},null,8,be)]))),128))]),_:1},8,["modelValue"]),i(p,{class:"mt-2",message:o(s).errors.images},null,8,["message"])]),e("div",xe,[b(e("button",{disabled:o(s).processing,onClick:l[5]||(l[5]=t=>n.$refs.moreImages.click()),class:"inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-main-500 border border-transparent rounded-md shadow-sm hover:bg-main-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-main-500 transition duration-150 ease-in-out"},[we,y(" Add More Images ")],8,ve),[[k,r.value.length>0]]),e("input",{disabled:o(s).processing,id:"more-images",ref:"moreImages",class:"hidden",type:"file",multiple:"",onChange:x},null,40,ye)])]),e("div",ke,[i(p,{class:"mt-2",message:o(s).errors.content},null,8,["message"]),i(H,{modelValue:_.value,"onUpdate:modelValue":l[6]||(l[6]=t=>_.value=t)},null,8,["modelValue"])]),e("div",Ve,[e("button",{disabled:o(s).processing,class:"w-full inline-flex justify-center items-center px-4 py-2 text-sm font-medium text-white bg-main-500 border border-transparent rounded-md shadow-sm hover:bg-main-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-main-500 transition duration-150 ease-in-out",onClick:I},Ie,8,Ce)])])])]),_:1})],64))}},Pe=Z(je,[["__scopeId","data-v-5869180c"]]);export{Pe as default};
