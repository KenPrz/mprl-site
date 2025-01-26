import{r as x,T as E,o as U,b as p,c as f,d as a,u as o,Z as B,w as c,e,i as $,f as j,g as D,m as N,t as S,j as A,F as w,h as F,p as T,l as M}from"./app-CnlmfPpy.js";import{_ as P}from"./AuthenticatedLayout-Dp7rDHVB.js";import{s as q,V as L}from"./vue-multiselect.css_vue_type_style_index_0_src_true_lang-_1QSzsEr.js";import{_}from"./InputError-BN-hN_5I.js";import{_ as y}from"./Toggle-DiusMwrH.js";import{E as R}from"./Editor-CGjuC4gl.js";import{_ as O}from"./_plugin-vue_export-helper-DlAUqK2U.js";import"./ApplicationLogo-CBssuap1.js";import"./Dropdown-h2357vda.js";const u=m=>(T("data-v-ab3dfe18"),m=m(),M(),m),Z=u(()=>e("h2",{class:"font-semibold text-xl text-gray-800 leading-tight"},"Edit Blog",-1)),z={class:"py-12"},G={class:"flex flex-col space-y-5 max-w-7xl mx-auto sm:px-6 lg:px-8"},H={class:"flex justify-start"},J={class:"w-full bg-white rounded-md p-4 shadow-md space-y-4"},K={class:"grid grid-cols-1 sm:grid-cols-2 gap-4"},Q={class:"col-span-1 sm:col-span-2"},W=u(()=>e("label",{for:"form-title",class:"block text-lg font-medium text-gray-700"},"Title",-1)),X={class:"col-span-1 sm:col-span-2"},Y=u(()=>e("label",{for:"categories",class:"block text-lg font-medium text-gray-700"},"Categories",-1)),ee={key:0,class:"multiselect__single"},se={class:"flex flex-wrap space-x-4"},te=u(()=>e("label",{for:"is_published",class:"block text-lg font-medium text-gray-700"},"Published",-1)),le=u(()=>e("label",{for:"is_featured",class:"block text-lg font-medium text-gray-700"},"Featured",-1)),oe={class:"flex flex-wrap mt-4"},ae=["onClick"],ie=u(()=>e("i",{style:{color:"red"},class:"pi pi-times-circle"},null,-1)),de=[ie],re=["src"],ne={class:"mt-4 flex justify-end"},ue={class:"bg-white overflow-hidden shadow-sm sm:rounded-lg"},me={__name:"Edit",props:{categories:{type:Array,required:!0},blog:{type:Object,required:!0}},setup(m){const d=m,h=x([]),t=E({new_images:[],deleted_images:[],categories:d.blog.categories||[],title:d.blog.title,content:d.blog.body,is_published:d.blog.is_published,is_featured:d.blog.is_featured}),b=x(d.blog.body),r=x(d.blog.images.map(i=>({id:i.id,url:`/storage/${i.image}`})));function V(i){const l=i.target.files,s=[],n=[];Array.from(l).forEach(g=>{s.push(g);const v=new FileReader;v.onload=C=>{n.push({id:null,url:C.target.result}),n.length===l.length&&(h.value.push(...s),r.value.push(...n))},v.readAsDataURL(g)})}function k(i){const l=r.value.findIndex(n=>n.id===i),s=r.value[l];s.id&&t.deleted_images.push(s.id),r.value.splice(l,1)}function I(){h.value.length>0?t.new_images=h.value:t.new_images=null,t.content=b.value,t.categories=t.categories.map(i=>i.id),t.post(route("admin.blog.update",d.blog.id))}return U(()=>{t.clearErrors()}),(i,l)=>(p(),f(w,null,[a(o(B),{title:"Edit Blog"}),a(P,null,{header:c(()=>[Z]),default:c(()=>[e("div",z,[e("div",G,[e("div",H,[a(o($),{class:"bg-main-400 px-2 py-1 rounded-md text-white hover:bg-main-500 mb-2",href:i.route("admin.blog.index")},{default:c(()=>[j(" Back ")]),_:1},8,["href"])]),e("div",J,[e("div",K,[e("div",Q,[W,D(e("input",{id:"form-title",class:"w-full mt-1 p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent","onUpdate:modelValue":l[0]||(l[0]=s=>o(t).title=s),type:"text"},null,512),[[N,o(t).title]]),a(_,{class:"mt-2",message:o(t).errors.title},null,8,["message"])]),e("div",X,[Y,a(o(q),{modelValue:o(t).categories,"onUpdate:modelValue":l[1]||(l[1]=s=>o(t).categories=s),options:d.categories,multiple:!0,"close-on-select":!1,"clear-on-select":!1,"preserve-search":!0,placeholder:"Select categories",label:"name","track-by":"id","preselect-first":!1},{selection:c(({values:s,search:n,isOpen:g})=>[s.length&&!g?(p(),f("span",ee,S(s.length)+" categories selected ",1)):A("",!0)]),_:1},8,["modelValue","options"]),a(_,{class:"mt-2",message:o(t).errors.categories},null,8,["message"])])]),e("div",se,[e("div",null,[te,a(y,{modelValue:o(t).is_published,"onUpdate:modelValue":l[2]||(l[2]=s=>o(t).is_published=s)},null,8,["modelValue"])]),e("div",null,[le,a(y,{modelValue:o(t).is_featured,"onUpdate:modelValue":l[3]||(l[3]=s=>o(t).is_featured=s)},null,8,["modelValue"])])]),e("div",oe,[a(o(L),{modelValue:r.value,"onUpdate:modelValue":l[4]||(l[4]=s=>r.value=s),tag:"div",class:"flex flex-wrap"},{default:c(()=>[(p(!0),f(w,null,F(r.value,s=>(p(),f("div",{key:s.id,class:"relative w-1/2 sm:w-1/3 md:w-1/4 p-2"},[e("button",{onClick:n=>k(s.id),class:"absolute -top-2 -right-2 text-white rounded-full p-1"},de,8,ae),e("img",{src:s.url,class:"w-full h-auto rounded-md shadow-md cursor-move"},null,8,re)]))),128))]),_:1},8,["modelValue"]),a(_,{class:"mt-2",message:o(t).errors.images},null,8,["message"])]),e("div",ne,[e("button",{class:"bg-main-400 px-2 py-1 rounded-md text-white hover:bg-main-500",onClick:l[5]||(l[5]=s=>i.$refs.moreImages.click())},"Add More Images"),e("input",{id:"more-images",ref:"moreImages",class:"hidden",type:"file",multiple:"",onChange:V},null,544)])]),e("div",ue,[a(_,{class:"mt-2",message:o(t).errors.content},null,8,["message"]),a(R,{modelValue:b.value,"onUpdate:modelValue":l[6]||(l[6]=s=>b.value=s)},null,8,["modelValue"])]),e("div",{class:"flex justify-end mt-4"},[e("button",{class:"bg-main-400 px-2 py-1 rounded-md text-white hover:bg-main-500 mb-2",onClick:I}," Update ")])])])]),_:1})],64))}},we=O(me,[["__scopeId","data-v-ab3dfe18"]]);export{we as default};
