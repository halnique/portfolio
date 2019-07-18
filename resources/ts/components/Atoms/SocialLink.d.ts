/// <reference types="react" />
import { SocialAccount } from "index";
declare type Props = {
    name: SocialAccount.Account;
    url: SocialAccount.Url;
};
declare const SocialLink: (props: Props) => JSX.Element;
export default SocialLink;
