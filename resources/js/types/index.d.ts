export interface User {
    id: number;
    name: string;
    email: string;
    email_verified_at?: string;
}

interface Plan {
    id: number,
    name: string,
    storageLimit: number,
    bandwidthLimit: number,
    ramLimit: number,
    description: string,
    isPublic: boolean,
    isPopular: boolean
    pricing: Pricing,
    features: Feature[]
}

interface Plans {
    plans: Plan[]
}

interface Pricing {
    planId: number,
    price: number,
    billingCycle: billingCycle
}

interface Feature {
    key: number;
    description: string
}

enum billingCycle {
    MONTHLY = 'Monthly',
    YEARLY = 'Yearly'
}

export type PageProps<
    T extends Record<string, unknown> = Record<string, unknown>,
> = T & {
    auth: {
        user: User;
    };
    plans: Plans
};
