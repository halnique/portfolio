

type SocialAccount = {
    account: string,
    url: string,
}

export declare namespace SocialAccount {
    export type Account = SocialAccount["account"]
    export type Url = SocialAccount["url"]
}

type Tag = {
    id: number,
    name: string,
}

export declare namespace Tag {
    export type ID = Profile["id"]
    export type Name = Profile["name"]
}

type Profile = {
    id: number,
    name: string,
    introductions: string,
    iconUrl: string,
    github: SocialAccount,
    twitter: SocialAccount,
    qiita: SocialAccount,
    hatena: SocialAccount,
    tags: Array<Tag>,
}

export declare namespace Profile {
    export type ID = Profile["id"]
    export type Name = Profile["name"]
    export type Introductions = Profile["introductions"]
    export type IconUrl = Profile["iconUrl"]
}
