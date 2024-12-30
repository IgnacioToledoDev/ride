import { Plan, BillingCycle } from "@/interfaces/plan";

export interface User {
    id: number;
    name: string;
    email: string;
    email_verified_at?: string;
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

export type PageProps<
    T extends Record<string, unknown> = Record<string, unknown>,
> = T & {
    auth: {
        user: User;
    };
    plans: Plans
};
