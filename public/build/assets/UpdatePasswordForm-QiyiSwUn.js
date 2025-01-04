import{r as _,T as y,d as n,e as l,g as r,f as e,u as o,q as d,i as f,j as v,H as x,E as V}from"./app-D7Jmbt7w.js";import{_ as c}from"./InputError-SRVMLVH8.js";import{_ as i}from"./InputLabel-uEQ9Ex_Z.js";import{_ as k}from"./PrimaryButton-DTIPntxk.js";import{T as p}from"./TextInput-DrMlUxMD.js";import"./_plugin-vue_export-helper-DlAUqK2U.js";const P=r("header",null,[r("h2",{class:"text-lg font-medium text-gray-900"},"Update Password"),r("p",{class:"mt-1 text-sm text-gray-600"}," Ensure your account is using a long, random password to stay secure. ")],-1),b={key:0},h={key:1},S=r("p",{class:"text-green-500"}," You are currently using Google to sign in. Enter a new password below to secure your account. ",-1),E=[S],I={class:"flex items-center gap-4"},N={key:0,class:"text-sm text-gray-600"},G={__name:"UpdatePasswordForm",props:{is_google_user:{type:Boolean,required:!0}},setup(u){const m=_(null),w=_(null),s=y({is_google_user:u.is_google_user,current_password:"",password:"",password_confirmation:""}),g=()=>{s.put(route("password.update"),{preserveScroll:!0,onSuccess:()=>s.reset(),onError:()=>{s.errors.password&&(s.reset("password","password_confirmation"),m.value.focus()),s.errors.current_password&&(s.reset("current_password"),w.value.focus())}})};return(U,a)=>(n(),l("section",null,[P,r("form",{onSubmit:V(g,["prevent"]),class:"mt-6 space-y-6"},[u.is_google_user?d("",!0):(n(),l("div",b,[e(i,{for:"current_password",value:"Current Password"}),e(p,{id:"current_password",ref_key:"currentPasswordInput",ref:w,modelValue:o(s).current_password,"onUpdate:modelValue":a[0]||(a[0]=t=>o(s).current_password=t),type:"password",class:"mt-1 block w-full",autocomplete:"current-password"},null,8,["modelValue"]),e(c,{message:o(s).errors.current_password,class:"mt-2"},null,8,["message"])])),u.is_google_user?(n(),l("div",h,E)):d("",!0),r("div",null,[e(i,{for:"password",value:"New Password"}),e(p,{id:"password",ref_key:"passwordInput",ref:m,modelValue:o(s).password,"onUpdate:modelValue":a[1]||(a[1]=t=>o(s).password=t),type:"password",class:"mt-1 block w-full",autocomplete:"new-password"},null,8,["modelValue"]),e(c,{message:o(s).errors.password,class:"mt-2"},null,8,["message"])]),r("div",null,[e(i,{for:"password_confirmation",value:"Confirm Password"}),e(p,{id:"password_confirmation",modelValue:o(s).password_confirmation,"onUpdate:modelValue":a[2]||(a[2]=t=>o(s).password_confirmation=t),type:"password",class:"mt-1 block w-full",autocomplete:"new-password"},null,8,["modelValue"]),e(c,{message:o(s).errors.password_confirmation,class:"mt-2"},null,8,["message"])]),r("div",I,[e(k,{disabled:o(s).processing},{default:f(()=>[v("Save")]),_:1},8,["disabled"]),e(x,{"enter-active-class":"transition ease-in-out","enter-from-class":"opacity-0","leave-active-class":"transition ease-in-out","leave-to-class":"opacity-0"},{default:f(()=>[o(s).recentlySuccessful?(n(),l("p",N,"Saved.")):d("",!0)]),_:1})])],32)]))}};export{G as default};
