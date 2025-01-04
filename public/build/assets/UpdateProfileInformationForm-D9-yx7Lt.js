import{aa as g,T as x,d as r,e as n,g as a,f as s,u as e,j as m,i as u,k as y,t as h,y as V,q as v,H as k,E as w}from"./app-D7Jmbt7w.js";import{_ as d}from"./InputError-SRVMLVH8.js";import{_ as f}from"./InputLabel-uEQ9Ex_Z.js";import{_ as b}from"./PrimaryButton-DTIPntxk.js";import{T as c}from"./TextInput-DrMlUxMD.js";import"./_plugin-vue_export-helper-DlAUqK2U.js";const N=a("header",null,[a("h2",{class:"text-lg font-medium text-gray-900"},"Profile Information"),a("p",{class:"mt-1 text-sm text-gray-600"}," Update your account's profile information and email address. ")],-1),S={class:"flex sm:flex-row flex-col"},E={class:"w-1/2"},T={class:"w-1/2 ps-2"},U={key:0},q={class:"text-sm mt-2 text-gray-800"},B={class:"mt-2 font-medium text-sm text-green-600"},$={class:"flex items-center gap-4"},C={key:0,class:"text-sm text-gray-600"},D={__name:"UpdateProfileInformationForm",props:{mustVerifyEmail:{type:Boolean},status:{type:String}},setup(p){const i=g().props.auth.user,t=x({first_name:i.first_name,last_name:i.last_name,email:i.email});return(_,o)=>(r(),n("section",null,[N,a("form",{onSubmit:o[3]||(o[3]=w(l=>e(t).patch(_.route("profile.update")),["prevent"])),class:"mt-6 space-y-6"},[a("div",S,[a("div",E,[s(f,{for:"first_name",value:"First Name"}),s(c,{id:"name",type:"text",class:"mt-1 block w-full",modelValue:e(t).first_name,"onUpdate:modelValue":o[0]||(o[0]=l=>e(t).first_name=l),required:"",autofocus:"",autocomplete:"First Name"},null,8,["modelValue"]),s(d,{class:"mt-2",message:e(t).errors.first_name},null,8,["message"])]),a("div",T,[s(f,{for:"last_name",value:"Last Name"}),s(c,{id:"last_name",type:"text",class:"mt-1 block w-full",modelValue:e(t).last_name,"onUpdate:modelValue":o[1]||(o[1]=l=>e(t).last_name=l),required:"",autocomplete:"Last Name"},null,8,["modelValue"]),s(d,{class:"mt-2",message:e(t).errors.last_name},null,8,["message"])])]),a("div",null,[s(f,{for:"email",value:"Email"}),s(c,{id:"email",type:"email",class:"mt-1 block w-full",modelValue:e(t).email,"onUpdate:modelValue":o[2]||(o[2]=l=>e(t).email=l),required:"",autocomplete:"username"},null,8,["modelValue"]),s(d,{class:"mt-2",message:e(t).errors.email},null,8,["message"])]),p.mustVerifyEmail&&e(i).email_verified_at===null?(r(),n("div",U,[a("p",q,[m(" Your email address is unverified. "),s(e(y),{href:_.route("verification.send"),method:"post",as:"button",class:"underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"},{default:u(()=>[m(" Click here to re-send the verification email. ")]),_:1},8,["href"])]),h(a("div",B," A new verification link has been sent to your email address. ",512),[[V,p.status==="verification-link-sent"]])])):v("",!0),a("div",$,[s(b,{disabled:e(t).processing},{default:u(()=>[m("Save")]),_:1},8,["disabled"]),s(k,{"enter-active-class":"transition ease-in-out","enter-from-class":"opacity-0","leave-active-class":"transition ease-in-out","leave-to-class":"opacity-0"},{default:u(()=>[e(t).recentlySuccessful?(r(),n("p",C,"Saved.")):v("",!0)]),_:1})])],32)]))}};export{D as default};
