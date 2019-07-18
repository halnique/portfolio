import React from 'react';
import { SocialAccount } from "index";

type Props = {
    name: SocialAccount.Account,
    url: SocialAccount.Url,
}

const SocialLink = (props: Props) => (
    <a href={props.url} className="card-link" target="_blank">{props.name}</a>
);

export default SocialLink;
