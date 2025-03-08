import './bootstrap';
import {ZiggyVue} from 'ziggy-js';
import {register} from "swiper/element";

import {createApp} from 'vue';
import {
  IconBrain, IconLocation, IconPhoneCall, IconMail
} from "@tabler/icons-vue"
import LocationTabs from "@/components/LocationTabs.vue";
import BillboardList from "@/components/billboards/BillboardList.vue";
import BillboardShow from "@/components/billboards/BillboardShow.vue";
import Pagination from "@/components/pagination.vue";
import ThemeSwitch from "@/components/ThemeSwitch.vue";
import AppLogo from "@/components/AppLogo.vue";
import ResponsiveNav from "@/components/ResponsiveNav.vue";
import FeatureCard from "@/components/FeatureCard.vue";
import {
  Select,
  SelectContent,
  SelectGroup,
  SelectItem,
  SelectLabel,
  SelectTrigger,
  SelectValue,
} from '@/components/ui/select'
import {
  Card,
  CardContent,
  CardDescription,
  CardFooter,
  CardHeader,
  CardTitle,
} from '@/components/ui/card'
import {
  AlertDialog,
  AlertDialogContent,
  AlertDialogDescription,
  AlertDialogFooter,
  AlertDialogHeader,
  AlertDialogTitle,
  AlertDialogTrigger,
} from '@/components/ui/alert-dialog'
import {Input} from "@/components/ui/input";
import {Button} from "@/components/ui/button";
import {Textarea} from "@/components/ui/textarea";
import {Label} from "@/components/ui/label";

register()

const app = createApp({});

app
  .use(ZiggyVue)
  .component('location-tabs', LocationTabs)
  .component('billboard-list', BillboardList)
  .component('billboard-show', BillboardShow)
  .component('pagination', Pagination)
  .component('theme-switch', ThemeSwitch)
  .component('app-logo', AppLogo)
  .component('responsive-nav', ResponsiveNav)
  .component('feature-card', FeatureCard)
  .component('brain-icon', IconBrain)
  .component('location-icon', IconLocation)
  .component('phone-icon', IconPhoneCall)
  .component('email-icon', IconMail)
  .component('Select', Select)
  .component('SelectContent', SelectContent)
  .component('SelectGroup', SelectGroup)
  .component('SelectItem', SelectItem)
  .component('SelectLabel', SelectLabel)
  .component('SelectTrigger', SelectTrigger)
  .component('SelectValue', SelectValue)
  .component('Card', Card)
  .component('CardContent', CardContent)
  .component('CardDescription', CardDescription)
  .component('CardTitle', CardTitle)
  .component('CardHeader', CardHeader)
  .component('CardFooter', CardFooter)
  .component('AlertDialog', AlertDialog)
  .component('AlertDialogContent', AlertDialogContent)
  .component('AlertDialogDescription', AlertDialogDescription)
  .component('AlertDialogTitle', AlertDialogTitle)
  .component('AlertDialogHeader', AlertDialogHeader)
  .component('AlertDialogFooter', AlertDialogFooter)
  .component('AlertDialogTrigger', AlertDialogTrigger)
  .component('Button', Button)
  .component('Textarea', Textarea)
  .component('Input', Input)
  .component('Label', Label)
  .mount('#app')
